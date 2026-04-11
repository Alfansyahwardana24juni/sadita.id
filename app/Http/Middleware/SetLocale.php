<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

public function handle($request, Closure $next)
{
    if (Session::has('locale')) {
        App::setLocale(Session::get('locale'));
    } else {
        // Jangan gunakan config('app.locale'), langsung tulis 'id'
        // Ini akan memastikan pengunjung baru PASTI dapat Bahasa Indonesia
        App::setLocale('id');
        Session::put('locale', 'id'); 
    }

    return $next($request);
}
