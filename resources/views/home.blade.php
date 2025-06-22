 <link href="{{ asset('css/laravel_style.css') }}" rel="stylesheet">
 <!-- resources/views/form.blade.php -->
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    
</head>
<body>
<div style='width:100%'>
@if(session('message'))
    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 9999;">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
 @include('header')
<form action="{{ route('submitForm') }}" method="POST" style='display:none;'>
     @csrf
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>


    <div class="form-container" style='right'>
        <h2>Registration Form</h2>
        <!-- <form action="{{ route('submitForm') }}" method="POST"> -->
          <form id='reg_form' method="POST"  action="">
    @csrf
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" required placeholder="Enter your full name" value="John Doe">
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required placeholder="Enter your email" value="johndoe@example.com">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Create a password" value="Password123">
    </div>

    <div class="form-group row">
        <label>Gender</label>
        <input type="radio" id="male" name="gender" value="male" checked>
        <label for="male">Male</label>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label>
    </div>

    <div class="form-group">
        <label for="hobbies">Select your hobbies</label>
        <input type="checkbox" id="reading" name="hobbies" value="Reading" checked>
        <label for="reading">Reading</label>
        
        <input type="checkbox" id="travelling" name="hobbies" value="Travelling" checked>
        <label for="travelling">Travelling</label>

        <input type="checkbox" id="coding" name="hobbies" value="Coding">
        <label for="coding">Coding</label>
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="4" placeholder="Write your message...">Hello, I am interested in your services.</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>


        
    </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>var customActionUrl = "{{ route('submitForm') }}"; // Laravel route helper</script>
<script src="{{ asset('js/validate.js')}}" ></script>
<script>
    
    $(document).ready(function() {
    // Check if the success message is present
    @if(session('message'))
        // Automatically hide the success message after 2 seconds (2000 milliseconds)
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
              //  successMessage.classList.remove('show');
                $('.show').css('display','none');
            }
        }, 2000); // 2000ms = 2 seconds
    @endif
 });
    
   
</script>