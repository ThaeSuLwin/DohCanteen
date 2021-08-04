<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class CheckCanteen
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
        // Auth::guard('canteen');
        $user = Auth::guard('canteen');
        // dd($user);
        // dd($id);
        // dd(Auth::user()->id);
    //    if( auth()::guard('canteen')->active !== '1'){
    //         return "Hello World";
    //     }
     
        return $next($request);
    }
}
