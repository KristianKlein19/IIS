<?php

namespace App\Http\Controllers;

use App\Models\Skupina;
use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function index() {
        return view('userlist.index')->with('userlist', User::all());
    }

    public function ban($id) {
        // find groups where user is owner
        $groups = Skupina::all()->where('spravce', $id);

        foreach ($groups as $group) {
            $group->spravce = auth()->user()->id; // take over the group
            $group->save();
        }

        $user = User::find($id);
        if ($user != null)
            $user->delete();
        return redirect()->back();
    }
}
