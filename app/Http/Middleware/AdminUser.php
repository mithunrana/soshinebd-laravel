<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AdminUser
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
        if (!Auth::check()) {
            return redirect('login');
        }
        elseif(Auth::check()){
            if(Auth::user()->activestatus =='TechHelpInfoAdmin'){
                return $next($request);
            }elseif(Auth::user()->activestatus =='EndUserNotActive'){
                return redirect('verify');
            }else{
                return redirect('user-panel');
            }
        }
    }
}
