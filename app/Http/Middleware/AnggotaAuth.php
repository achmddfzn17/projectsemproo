<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AnggotaAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->guard('anggota')->check()) {
            return redirect()->route('anggota.login')->with('error', 'Silakan login terlebih dahulu');
        }

        return $next($request);
    }
}
