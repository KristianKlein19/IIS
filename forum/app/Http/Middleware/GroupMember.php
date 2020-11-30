<?php

namespace App\Http\Middleware;

use App\Models\Skupina;
use Closure;
use Illuminate\Http\Request;

class GroupMember
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
        $group = Skupina::find($request->route('id'));

        if (!auth()->user()->isMember($group)) {
            return redirect()->back();
        }

        return $next($request);
    }
}
