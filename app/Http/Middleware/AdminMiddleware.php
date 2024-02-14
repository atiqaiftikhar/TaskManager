<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ( Auth::check())
            {

                //admin role == 2
                //user role == 1
                $role=auth()->user()->role_id;
                // dd(gettype($role));
                if($role !== 2)
                abort(403,"INVALID ACCESS");
                //return redirect('home');

            }
            else{
                return route('login');
            }
        return $next($request);
    }
}
