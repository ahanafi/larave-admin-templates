<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function blank()
    {
        return view('pages.blank');
    }

    public function starter()
    {
        return view('pages.starter');
    }

    public function error404()
    {
        return view('errors.404');
    }

    public function error500()
    {
        return view('errors.500');
    }
}
