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

        if (Auth::guard('peserta')->check()) {
            // return redirect(RouteServiceProvider::DASHBOARD);
            return redirect()->route('user.dashboard.view');
        }
        elseif (Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->jenis_role->nama == 'admin') {
                return redirect()->route('admin.dahboard.view');
            } 
            elseif (Auth::guard('web')->user()->jenis_role == 'evaluator') {
                return redirect()->route('evaluator.dashboard.view');
            }
            elseif (Auth::guard('web')->user()->jenis_role == 'lead evaluator') {
                return redirect()->route('lead_evaluator.dashboard.view');
            }
            else {
                return redirect()->route('sekretariat.dashboard.view');
            }
        }

        return $next($request);
    }
}
