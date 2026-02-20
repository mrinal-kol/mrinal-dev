<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostData;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Exception;

class FormController extends Controller
{
   
    // Show the form
    public function showForm()
    {
        return view('form');
    }
    public function addregistration(Request $request)
    {
        try {

            // ✅ check login
            if (!Auth::check()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Session expired, please login again"
                ], 401); // unauthorized
            }

            // ✅ validation
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // ✅ insert data
            $post = PostData::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'gender'   => $request->gender,
                'hobbies'  => $request->hobbies,
                'message'  => $request->message,
            ]);

            return response()->json([
                "status" => "success",
                "message" => "Form submitted successfully"
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                "status" => "error",
                "message" => $e->getMessage()
            ], 500);
        }
    }
    // Handle form submission
    public function submitForm(Request $request)
    {

        // 👇 FIXED: form should only submit if user IS logged in
        if ($request->isMethod('post')) 
        {
            // If user is not logged in — redirect to home/login
            if (!Auth::check()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/')
                    ->with('error', 'Session expired, please login again.');
            }

            // Validate data
                /*
                $request->validate([
                    'title' => 'required|max:255',
                    'body' => 'required',
                ]);
                */
                // echo "<pre>";
                // print_r($request->all());
                // exit;
                //protected $fillable = ['SL_NAME','SL_CLASS','SL_ROLL','updated_at','created_at'];
                // Insert the data into the posts table

                try{
                        $post = PostData::create([
                    
                            'name'     => $request->name,
                            'email'    => $request->email,
                            'password' => Hash::make($request->password), // never store plain passwords!
                            'gender'   => $request->gender,
                            'hobbies'  => $request->hobbies,
                            'message'  => $request->message,
                        ]);

                        // Return success message
                        if ($post) {
                            return response()->json(['message' => 'Form submitted successfully!','flag'=>'add']);
                        //  session()->flash('message', 'Post created successfully!');
                        // return response()->json([
                        //     'message' => 'Post created successfully!',
                        //     'post' => $post
                        // ]);
                        } else {
                            return response()->json(['message' => 'Post creation failed.'], 500);
                            // session()->flash('message', 'Post creation failed.');
                            //return response()->json(['message' => 'Post creation failed.'], 500);
                        }

                        //return redirect()->action([HomeController::class, 'index']);
                        //return redirect()->route('home');
                        //print_r($request->all());
                }
                catch(Exception $e)
                {
                    return response()->json([
                    'error' => true,
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                    ], 500);
                }
                exit;
        }

        // Process the data (e.g., save to the database)
        // For now, we will just return the validated data
        //return back()->with('success', 'Form submitted successfully!')->with('data', $validatedData);
    }
    
}
