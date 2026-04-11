<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;       // ✅ WAJIB: untuk App::setLocale()
use Illuminate\Support\Facades\Session;   // ✅ WAJIB: untuk Session::put()

class LocaleController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang, ['id', 'en'])) {
            App::setLocale($lang);             // ✅ Pakai namespace Illuminate\Support\Facades\App
            Session::put('locale', $lang);     // ✅ Pakai namespace Illuminate\Support\Facades\Session
        }

        return redirect()->back(); // atau return back();
    }
}
