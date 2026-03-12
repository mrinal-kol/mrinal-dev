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

    @php
        $action = Route::currentRouteAction();
        $method_nm = null;

        if ($action) {
            $method_nm = explode('@', $action)[1];
        }
    @endphp

    @if ($method_nm)
        <!-- <p>Method Name: {{ $method_nm }}</p> -->
    @endif

    <div class="container">

        

        @if($method_nm=='vueExample')
        
        <div id="app">
                <!-- <example-component></example-component> -->
                <!-- <example-fromsubmit></example-fromsubmit> -->
                <add-student></add-student>
        </div>
            @vite('resources/js/app.js')
        @endif

        

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