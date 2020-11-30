<?php

namespace App\Http\Middleware;

use App\Models\Clen;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ProfileProtection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $profile = User::find($request->route('user_id'));
        if ($profile == null) {
            return redirect()->back();
        }

        if (!$this->canViewProfile(auth()->user(), $profile)) {
            return redirect()->back();
        }

        return $next($request);
    }

    private function canViewProfile($user, $profile)
    {
        if ($profile->viditelnost == 0) // unprotected profile can be viewed by all users
            return true;
        elseif ($user == null) // authorisation check
            return false;
        elseif ($profile->viditelnost == 1) // authorised user can view profile visible only for registered users
            return true;
        elseif ($profile == $user->getUser()) // user can view their own profile
            return true;
        elseif ($user->isAdmin()) // admin can view all profiles
            return true;
        elseif ($profile->viditelnost == 2) { // only members of groups owner is part of can view profiel
            $uxs = Clen::all()->where('id_users', $profile->id);
            $uys = Clen::all()->where('id_users', $user->id);

            // too tired for db stuff

            foreach ($uxs as $ux) {
                foreach ($uys as $uy) {
                    if ($ux->id_skupina == $uy->id_skupina)
                        return true;
                }
            }
            return false;
        }
        else
            return false;
    }
}
