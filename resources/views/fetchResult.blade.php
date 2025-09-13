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
      .card {
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        .card-header {
            background: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: red;
            border-radius: 25px;
            font-size: 1.1rem;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        

        @media (min-width: 768px) {
    .col-md-6 {
        -ms-flex: 0 0 50%;
        flex: 0 0 50%;
        max-width: 90%; /* 👈 custom override */
    }
}

    </style>
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

<h1>Edit Student Details</h1>

    
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Registration Form</div>
                <div class="card-body">
                    @if($details)
                    <form id="reg_form" method="POST" >
                        @csrf

                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control" required 
                                   value="{{ $details->name ?? '' }}">
                            <input type="hidden" id="id" name="id" class="form-control" required 
                                   value="{{ $details->id ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control" required 
                                   value="{{ $details->email ?? '' }}">
                        </div>

                       

                        <div class="form-group">
                            <label>Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="male" name="gender" value="male" class="form-check-input" 
                                       {{ $details->gender === 'male' ? 'checked' : '' }}>
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" id="female" name="gender" value="female" class="form-check-input" 
                                       {{ $details->gender === 'female' ? 'checked' : '' }}>
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Hobbies</label><br>
                            @php
                                $hobbies = explode(',', $details->hobbies ?? '');
                            @endphp
                            <div class="form-check form-check-inline">
                                <input type="checkbox" id="reading" name="hobbies[]" value="Reading" class="form-check-input"
                                       {{ in_array('Reading', $hobbies) ? 'checked' : '' }}>
                                <label for="reading" class="form-check-label">Reading</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" id="travelling" name="hobbies[]" value="Travelling" class="form-check-input"
                                       {{ in_array('Travelling', $hobbies) ? 'checked' : '' }}>
                                <label for="travelling" class="form-check-label">Travelling</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" id="coding" name="hobbies[]" value="Coding" class="form-check-input"
                                       {{ in_array('Coding', $hobbies) ? 'checked' : '' }}>
                                <label for="coding" class="form-check-label">Coding</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="3">{{ $details->message ?? '' }}</textarea>
                        </div>
                        

                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                       
                        <a href="{{ route('services') }}"  class="btn btn-primary" style="background-color:black">Back</a>
                       
                    </form>
                    @else
                        <p>No student found.</p>
                        <a href="{{ route('services') }}"  class="btn btn-primary" style="background-color:black">Back</a>
                    @endif
                    <div id="responseMsg"></div>
                </div>
            </div>
        </div>
    </div>
</div>



  <footer>
    &copy; 2025 [Your Company Name]. All rights reserved.
  </footer>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>var customActionUrl = "{{ route('updateDetails') }}"; // Laravel route helper</script>
<script src="{{ asset('js/validate.js')}}" ></script>
<script>
    
    $(document).ready(function() {

      $('.edit').on('click',function(){
        alert($(this).data('value'));
      })

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