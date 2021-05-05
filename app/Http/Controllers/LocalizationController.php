<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function index($locale){
      
        if(!$locale){
            App::setlocale('en');
            session()->put('locale', 'en'); 
        }
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }

}
