<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function handle($request, Closure $next)
{
   if(\Session::has('locale'))
   {
       \App::setlocale(\Session::get('locale'));
   }
   return $next($request);
}
}
