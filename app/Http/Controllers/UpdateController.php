<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student_details;
use Illuminate\Support\Facades\Hash; 
class UpdateController extends Controller
{
    public function index()
    {
        //$details =Student_details::All();
        //echo "<pre>";
        //print_r($details->toArray());
        //return "i love you chirag";
        $surce='mrinal';
        return view('login', compact('surce'));
    }
     public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Fetch user by email
        $user = Student_details::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'No user found with this email.',
            ]);
        }

        if ($user->status != 1) {
            return back()->withErrors([
                'email' => 'Your account is inactive.',
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Incorrect password.',
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

}
