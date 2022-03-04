<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Cache;
use Carbon\Carbon;

class StatusUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth()->check()) {
            $expireTime = Carbon::now()->addSeconds(1);
            Cache()::put('is_online'.Auth()->User()->id, true, $expireTime);
            User::where('id', Auth()::User()->id)->update(['last_seen' => Carbon::now()]);
        }
        return $next($request);
    }
    
}
