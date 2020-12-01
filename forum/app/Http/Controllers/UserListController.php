<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function index() {
        return view('userlist.index')->with('userlist', User::all());
    }

    public function ban($id) {
        User::find($id)->delete();
        return redirect()->back();
    }
}
