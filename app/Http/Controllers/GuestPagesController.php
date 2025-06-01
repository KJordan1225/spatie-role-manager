<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestPagesController extends Controller
{
    public function aboutGA()
    {
        $layout = 'layouts.guest';
        return view('guest_pages.about_ga',compact('layout'));
    }

    public function mandatedPrograms()
    {
        $layout = 'layouts.guest';
        return view('guest_pages.mandated_programs', compact('layout'));
    }

    public function fraternityHistory()
    {
        $layout = 'layouts.guest';
        return view('guest_pages.fraternity_history', compact('layout'));
    }
}
