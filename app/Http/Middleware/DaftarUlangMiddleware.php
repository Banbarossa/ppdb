<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class DaftarUlangMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($request->user() && $request->user()->level_pendaftaran >= 5) {
            return $next($request);

        }
        Alert::error('Gagal', 'Anda Belum bisa melakukan daftar ulang');
        return redirect()->route('psb.dashboard');
    }
}
