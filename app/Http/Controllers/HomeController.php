<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function home()
    {
        // kalau kamu pakai Inertia, ganti jadi Inertia::render(...)
        return view('home');
    }
}
