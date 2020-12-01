<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembershipRequest;
use App\Models\Clen;
use App\Models\Moderator;
use App\Models\Skupina;
use App\Models\Zadost;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index($group) {
        if (!(auth()->user()->isModFor(Skupina::find($group))))
            return redirect()->home();
        return view('request.index')->with('requests', Zadost::all()->where('do', $group))->with('skupina', Skupina::find($group));
    }

    public function reject($group, $id) {
        $request = Zadost::find($id);
        $request->stav = 2;
        $request->save();

        // "reject" all other request from the same user to group the same group'
        $others = Zadost::all()->where('od', $request->od)->where('do', $request->do);
        foreach ($others as $other) {
            $other->stav = 2;
            $other->save();
        }

        return redirect()->back();
    }

    public function accept($group, $id) {
        $request = Zadost::find($id);

        if ($request->typ == 0)
        {
            Clen::Create([
                'id_users' => $request->od,
                'id_skupina' => $request->do
            ]);
        }
        else
        {
            Moderator::Create([
                'id_users' => $request->od,
                'id_skupina' => $request->do
            ]);
        }

        $request->stav = 1;
        $request->save();

        // "accept" all other request from the same user to group the same group'
        $others = Zadost::all()->where('od', $request->od)->where('do', $request->do);
        foreach ($others as $other) {
            $other->stav = 1;
            $other->save();
        }

        return redirect()->back();
    }

    public function showMembershipRequestForm($group_id) {
        return view('request.membership')->with('skupina', Skupina::find($group_id));
    }

    public function member(MembershipRequest $form) {
        if(auth()->user()->isMember(Skupina::find($form->skupina))) {
            return redirect()->route('membership-form', ['id' => $form->skupina])->withErrors(['message' => 'you are already a member!']);
        }
        Zadost::Create([
            'typ' => 0,
            'text' => $form->msg,
            'od' => auth()->user()->id,
            'do' => $form->skupina,
            'stav' => 0
        ]);
        return redirect()->route('group.view', ['id' => $form->skupina]);
    }

    public function showModeratorRequestForm($group_id) {
        return view('request.moderator')->with('skupina', Skupina::find($group_id));
    }

    public function moderator(MembershipRequest $form) {
        if(auth()->user()->isModFor(Skupina::find($form->skupina))) {
            return redirect()->route('moderator-form', ['id' => $form->skupina])->withErrors(['message' => 'you are already a moderator!']);
        }
        Zadost::Create([
            'typ' => 1,
            'text' => $form->msg,
            'od' => auth()->user()->id,
            'do' => $form->skupina,
            'stav' => 0
        ]);
        return redirect()->route('group.view', ['id' => $form->skupina]);
    }
}
