<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostData;
class FormController extends Controller
{
   
    // Show the form
    public function showForm()
    {
        return view('form');
    }

    // Handle form submission
    public function submitForm(Request $request)
    {
       // Validate data
        /*
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        */

        //print_r($request->all());
        //exit;

        // Insert the data into the posts table
        $post = PostData::create([
            
             'SL_NAME'=>'chirag',
             'SL_CLASS'=>2,
             'SL_ROLL'=>22
        ]);

        // Return success message
        if ($post) {
            session()->flash('message', 'Post created successfully!');
        // return response()->json([
        //     'message' => 'Post created successfully!',
        //     'post' => $post
        // ]);
        } else {
             session()->flash('message', 'Post creation failed.');
            //return response()->json(['message' => 'Post creation failed.'], 500);
        }
         return redirect()->action([HomeController::class, 'index']);
        //return redirect()->route('home');
        //print_r($request->all());
    exit;

        // Process the data (e.g., save to the database)
        // For now, we will just return the validated data
        //return back()->with('success', 'Form submitted successfully!')->with('data', $validatedData);
    }
}
