<?php

namespace App\Http\Middleware;

use App\Models\Registrasi;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SekretariatPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $is_sekretariat = count(Registrasi::where('sekretariat_id', Auth::user()->id)->get()) != 0;
            if ($is_sekretariat) {
                return $next($request);
            }
            return redirect('/404');
        }
        return redirect('/404');
    }
}
