<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // biarkan semua route auth/* lewat tanpa dicek
        if ($request->is('auth/*')) {
            return $next($request);
        }

        // kalau sudah login, lanjut
        if (Auth::check()) {
            return $next($request);
        }

        // kalau belum login, arahkan ke halaman login
        return redirect('/auth/login');
    }
}
