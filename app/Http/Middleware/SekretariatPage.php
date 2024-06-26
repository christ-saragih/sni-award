<?php

namespace App\Http\Middleware;

use App\Models\Konfigurasi;
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
            $tahun_sni = Konfigurasi::where('key', 'Tahun SNI Award')->distinct()->pluck('value')->first();
            $is_sekretariat = count(
                Registrasi::where('sekretariat_id', Auth::user()->id)
                    ->where('tahun', $tahun_sni)
                    ->get()
            ) != 0;
            $role = str_replace(' ', '_', Auth::user()->jenis_role->nama);
            if ($is_sekretariat) {
                return $next($request);
            }
            return redirect()->route("$role.dashboard.view");
        }
        return redirect('/404');
    }
}
