<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function en()
    {
        App::setlocale('en');
        Session::put('lang','en');
        return redirect()->back();
    }

    public function ar()
    {
        App::setLocale('ar');
        Session::put('lang','ar');
        return redirect()->back();
    }
}
