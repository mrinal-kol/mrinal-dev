<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        //return "i love you chirag";
        $surce='mrinal';
         return view('home', compact('surce'));
    }
    public function aboutus()
    {
        //echo "test";
        //aboutus.blade.php
        $surce='mrinal';
        return view('aboutus', compact('surce'));
    }
}
