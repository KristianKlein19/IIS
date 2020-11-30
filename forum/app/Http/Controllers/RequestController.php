<?php

namespace App\Http\Controllers;

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
        return view('request.index')->with('requests', Zadost::all()->where('do', $group));
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
}
