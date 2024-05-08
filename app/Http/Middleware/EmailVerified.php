<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $key => $guard) {
            $auth = Auth::guard($guard);
            if ($auth->check() && $auth->user()->email_verified_at != null) {
                return $next($request);
            } else {
                if ($guard == 'peserta') {
                    return redirect("/verifikasi");
                } else {
                    return redirect()->route('user.verification.view');
                }
            }
        }
    }
}
