<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class middlewareAllowUser
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
        $user = Auth::user();

        // if ($request->is('admin/*') && $user->hasRole('Admin')) {
        //     return $next($request);
        //     // return back();
        // }

        if ($request->is('Enseingnant/*') && $user->hasRole('Teacher')) {
            return $next($request);
            // return back();
        }

        // if ($request->is('Enseingnant/*') {
        //     // if ($user->hasRole('Teacher')) {
        //     //     return $next($request);
        //     // }
        //
        //     return $next($request);
        //     // return back();
        // }

        // if ($user->hasRole('Teacher') ) {
        //     return redirect('notes-des-evalautions');
        // }elseif ($user->hasRole('Admin')) {
        //     return redirect('gestion-des-professeurs');
        // }
        // return redirect('/');
    }
}
