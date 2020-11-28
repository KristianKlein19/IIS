<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdate;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit() {
        return view('profile.edit')->with('user', auth()->user());
    }

    public function update(ProfileUpdate $form) {
        $user = auth()->user()->getUser();

        $user->name = $form['name'];
        $user->bio = $form['bio'];

        $user->save();

        return redirect()->back();
    }
}
