<?php

namespace App\Http\Middleware;

use Closure;

class middlewareTeacher
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
        // role 1 correspond au Enseingnant

        $user = $this->auth->user()
        if ($user->hasRole('Teacher') ) {
            return redirect('notes-des-evalautions');
        }elseif ($user->hasRole('Admin')) {
            return redirect('gestion-des-professeurs');
        }
        return redirect('/');
    }
}
