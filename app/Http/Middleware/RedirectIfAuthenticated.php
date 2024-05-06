<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        // foreach ($guards as $guard) {
            // if (Auth::guard($guard)->check()) {
            //     return redirect(RouteServiceProvider::DASHBOARD);
            // }
            if (Auth::guard('peserta')->check()) {
                // return redirect(RouteServiceProvider::DASHBOARD);
                return redirect('/peserta/dashboard');
            }
            elseif (Auth::guard('web')->check()) {
                if (Auth::guard('web')->user()->jenis_role->nama == 'admin') {
                    return redirect('/admin/dashboard');
                } 
                // elseif (Auth::guard('web')->user()->jenis_role == 'evaluator') {
                else {
                    return redirect('/sekretariat/dashboard');
                }
            }
            // elseif (Auth::guard('web')->check() == false) {
            //     return redirect()->route('masukAdmin');
            // }
        // }

        return $next($request);
    }
}
