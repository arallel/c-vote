<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class vote
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
         $user =  DB::table('users')
                ->select('token')
                ->where('token', '=', session('token'))
                ->limit(1)
                ->count();
        if ($user == 1) {
          return $next($request);
        }elseif ($user == 0) {
             return redirect()->route('userlogin');
        }
        
    }
}
