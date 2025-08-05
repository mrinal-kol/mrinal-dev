<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student_details;
class UpdateController extends Controller
{
    public function index()
    {
        $details =Student_details::All();
        echo "<pre>";
        print_r($details->toArray());
        //return "i love you chirag";
        //$surce='mrinal';
        // return view('home', compact('surce'));
    }
}
