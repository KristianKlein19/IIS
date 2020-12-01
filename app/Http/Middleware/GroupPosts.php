<?php

namespace App\Http\Middleware;

use App\Models\Skupina;
use Closure;
use Illuminate\Http\Request;

class GroupPosts
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
        $group = Skupina::find($request->route('id1'));
        if ($group->zabezpeceni_obsahu == 0)
            return $next($request);
        elseif (auth()->user() == null)
            return redirect()->back();
        elseif (!auth()->user()->isMember($group))
            return redirect()->back();
        else
            return $next($request);
    }
}
