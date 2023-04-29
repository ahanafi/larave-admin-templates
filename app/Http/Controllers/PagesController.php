<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    {}

    public function error500()
    {}
}
