<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function links()
    {
        return view('home.links'); // Dit is de nieuwe pagina met alle links
    }
}
