<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student_details;
use Illuminate\Support\Facades\Auth;

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
        //$students = Student_details::all();
        
        $students = collect(DB::select("CALL StudentList()"));
        
        return view('aboutus', compact('students'));
    }
    public function getAllStudentDetails()
    {
        try {
            // Call stored procedure
            $students = collect(DB::select("CALL StudentList()"));

            if($students->isEmpty()) {
                return response()->json(['error' => 'No students found'], 404);
            }

            return response()->json($students); // Return JSON
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
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
        
        $details = collect(DB::select("CALL StudentDetailsById(?)",[$id]))->first();
        //$details =Student_details::find($id);
        //if ($details) {
            return view('fetchResult', compact('details'));
        //}

        //return response()->json(['message' => 'Student not found'], 404);
    
    }

    public function updateDetails(Request $request)
    {
        try {
        // Update using Query Builder
        DB::table('student_details')
            ->where('id', $request->id)
            ->update([
                'name'    => $request->name,
                'email'   => $request->email,
                'gender'  => $request->gender,
                'message' => $request->message,
            ]);

        // Redirect back to services with success message
            return response()->json(['message' => 'Form submitted successfully!','flag'=>'update']);
        } catch (\Exception $e) {
            return response()->json([
            'error' => true,
            'message' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
            ], 500);
        }
    }

    public function vueExample()
    {
        $surce='mrinal';
        return view('vueexample', compact('surce'));
    }
    public function crudExample()
    {
        $surce='mrinal';
        return view('crudExample', compact('surce'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); // 👈 clears session data
        $request->session()->regenerateToken();
        return redirect('/')->with('success','You have been logged out successfully.');
    }
}
