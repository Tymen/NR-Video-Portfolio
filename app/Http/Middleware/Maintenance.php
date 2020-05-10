<?php

namespace App\Http\Middleware;

use App\WebStats;
use Closure;
use Illuminate\Support\Facades\Auth;

class Maintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $getWebStats = WebStats::find(1);
        if ($getWebStats->maintenance){
            if(Auth::check() && Auth::user()->hasrole("admin")){
                return $next($request);
            }
            return redirect('/maintenance');
        }
        return $next($request);
    }
}
