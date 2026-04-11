<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil info apakah user datang dari klik link di dalam web kita sendiri
        $referer = $request->headers->get('referer');
        $isInternal = $referer && str_contains($referer, $request->getHost());

        // 1. Jika user klik tombol ganti bahasa secara manual (?lang=en)
        if ($request->has('lang')) {
            $locale = $request->get('lang');
            Session::put('locale', $locale);
        } 
        // 2. LOGIKA MUTLAK: Jika ini kunjungan "Fresh" (Tab Baru / Ketik URL manual / Klik dari luar)
        // Ciri-cirinya: Tidak ada parameter 'lang' DAN tidak datang dari link internal web kita
        elseif (!$isInternal) {
            $locale = 'id'; // SELALU Reset ke Indonesia
            Session::put('locale', 'id');
        } 
        // 3. Jika user sedang aktif klik menu-menu di dalam tab yang sama (Internal)
        else {
            $locale = Session::get('locale', 'id');
        }

        App::setLocale($locale);

        return $next($request);
    }
}