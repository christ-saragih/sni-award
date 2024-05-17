<?php

namespace App\Http\Middleware;

use App\Models\Registrasi;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LeadEvaluatorPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $is_sekretariat = count(Registrasi::where('sekretariat_id', Auth::user()->id)
                ->where('tahun', date('Y'))
                ->get()
            ) != 0;
            $role = strtolower(Auth::user()->jenis_role->nama);
            $role = $is_sekretariat ? 'sekretariat' : str_replace(' ', '_', $role);
            if ($role == 'lead_evaluator') {
                return $next($request);
            }
            return redirect()->route("$role.dashboard.view");
        }
        return redirect('/404');
    }
}
