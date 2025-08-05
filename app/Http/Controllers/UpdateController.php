<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
class UpdateController extends Controller
{
    public function index()
    {
        //return "i love you chirag";
        $surce='mrinal';
         return view('home', compact('surce'));
    }
}
