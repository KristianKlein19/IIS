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

    public function reject($id) {
        $request = Zadost::find($id);
        $request->stav = 2;
        $request->save();
        return redirect()->back();
    }

    public function accept($id) {
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
        return redirect()->back();
    }

    public function showMembershipRequestForm($group_id) {
        return view('request.membership')->with('skupina', Skupina::find($group_id));
    }

    public function member(MembershipRequest $form) {
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
        Zadost::Create([
            'typ' => 1,
            'text' => $form->msg,
            'od' => auth()->user()->id,
            'do' => $form->skupina,
            'stav' => 0
        ]);
        return redirect()->back('group.view', ['id' => $form->skupina]);
    }
}
