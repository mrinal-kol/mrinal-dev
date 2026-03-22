<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Form Centered</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/laravel_style.css') }}" rel="stylesheet">
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

    

   

    <!-- @if($method_nm=='Portfolio') -->
     <section id="portfolio">
      <h2>Portfolio</h2>
      <div class="portfolio">
        <div class="card">
          <h3>Project Alpha </h3>
          <p>A modern e-commerce platform with advanced filtering and real-time inventory.</p>
        </div>
        <div class="card">
          <h3>Brand Redesign</h3>
          <p>Complete brand identity overhaul for a growing tech startup.</p>
        </div>
        <div class="card">
          <h3>Analytics Dashboard</h3>
          <p>Data-rich dashboard built with Laravel and Vue.js for business insights.</p>
        </div>
      </div>
    </section>
    <div id="app">
            <!-- <example-component></example-component> -->
            <!-- <example-fromsubmit></example-fromsubmit> -->
             <portfolio :list='@json($list)'></portfolio>
    </div>
        @vite('resources/js/app.js')
    <!-- @endif -->

    

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
<script>var customActionUrl = "{{ route('submitForm') }}"; // Laravel route helper</script>
<script src="{{ asset('js/validate.js')}}" ></script>
<script>
$(document).ready(function() {
  $('.edit').on('click',function(){
    alert($(this).data('value'));
  })

  // Check if the success message is present
  @if(session('message'))
      setTimeout(function() {
          var successMessage = document.getElementById('success-message');
          if (successMessage) {
            $('.show').css('display','none');
          }
      }, 2000);
  @endif
});
</script>
