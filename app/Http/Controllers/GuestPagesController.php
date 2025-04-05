<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestPagesController extends Controller
{
    public function aboutGA()
    {
        return view('guest_pages.about_ga');
    }
}
