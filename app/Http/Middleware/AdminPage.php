<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $role = strtolower(Auth::user()->jenis_role->nama);
            $role = str_replace(' ', '_', $role);
            if ($role == 'admin') {
                return $next($request);
            }
            return redirect()->route("$role.dashboard.view");
        }
        return redirect('/404');
    }
}
