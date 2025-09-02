<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_details;

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
    public function services()
    {
        $students = Student_details::all();
        
        //echo "test";
        //aboutus.blade.php
        $surce='mrinal';
        return view('aboutus', compact('students'));
    }
    public function Portfolio()
    {
        //echo "test";
        //aboutus.blade.php
        $surce='mrinal';
        return view('aboutus', compact('surce'));
    }
    public function contactus()
    {
        //echo "test";
        //aboutus.blade.php
        $surce='mrinal';
        return view('aboutus', compact('surce'));
    }
    public function fetchData($id)
    {
        $details =Student_details::find($id);
        if ($details) {
            return view('fetchResult', compact('details'));
        }

        //return response()->json(['message' => 'Student not found'], 404);
    
    }

    public function vueExample()
    {
        $surce='mrinal';
        return view('vueexample', compact('surce'));
    }
}
