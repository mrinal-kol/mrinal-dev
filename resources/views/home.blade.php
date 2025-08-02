<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel Form Centered</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/laravel_style.css') }}" rel="stylesheet">

    <style>
      
.container-flex {
    width: 100%;
    min-height: 100vh;
    background-color: #f8f9fa;
    display: flex;
    justify-content: center;
}

.middle {
    width: 70%;
    background-color: #ffffff;
    /*padding: 40px 20px;
    margin: 40px auto;*/
/*    box-shadow: 0 0 10px rgba(0,0,0,0.1);*/
}
        .left, .right {
            flex: 1;
            background-color: #f2f2f2;
        }

      

        .form-container {
            width: 100%;
            max-width: 600px;
            margin: auto;
        }

        .alert-dismissible {
            z-index: 9999;
        }
    </style>
</head>
<body>

@if(session('message'))
    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert"
         style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%);">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@include('header')



<div class="container-flex">
    <div class="left">
        <!-- Optional Left Column -->
    </div>

    <div class="middle">
        <div class="form-container">
            <h2 class="mb-4 text-center">Registration Form</h2>

            <!-- action="{{ route('submitForm') }} -->
            <form id="reg_form" method="POST" >
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="John Doe">
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" required value="johndoe@example.com">
                </div>

                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required value="Password123">
                </div>

                <div class="form-group mb-3">
                    <label>Gender</label><br>
                    <input type="radio" id="male" name="gender" value="male" checked>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>

                <div class="form-group mb-3">
                    <label for="hobbies">Hobbies</label><br>
                    <input type="checkbox" id="reading" name="hobbies[]" value="Reading" checked>
                    <label for="reading">Reading</label>
                    <input type="checkbox" id="travelling" name="hobbies[]" value="Travelling" checked>
                    <label for="travelling">Travelling</label>
                    <input type="checkbox" id="coding" name="hobbies[]" value="Coding">
                    <label for="coding">Coding</label>
                </div>

                <div class="form-group mb-3">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="4">Hello, I am interested in your services.</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
            <div id="responseMsg"></div>
        </div>
    </div>

    <div class="right">
        <!-- Optional Right Column -->
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