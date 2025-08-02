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
    <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      padding: 40px 20px;
      background: white;
    }

    h1 {
      color: #333;
      text-align: center;
      margin-bottom: 20px;
    }

    p {
      color: #555;
    }

    .team-section {
      margin-top: 40px;
    }

    .team-member {
      margin-bottom: 20px;
    }

    footer {
      text-align: center;
      padding: 20px;
      background: #333;
      color: white;
      margin-top: 40px;
    }
  </style>
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
        @if($method_nm=='aboutus')
        
             
        
        
    <h1>About Us</h1>
    <p>Welcome to [Your Company Name]! We are a passionate team dedicated to providing high-quality solutions that help our clients thrive. Whether it's building custom software, designing user-friendly websites, or offering consulting services, we focus on delivering real results with integrity and care.</p>

    <p>Founded in [Year], our mission is to bring ideas to life through technology and creativity. We work with businesses of all sizes—from startups to global enterprises—and take pride in forming lasting relationships with our partners.</p>

    <div class="team-section">
      <h2>Meet the Team</h2>

      <div class="team-member">
        <h3>Jane Doe - CEO</h3>
        <p>Jane is the visionary behind [Your Company Name]. With over 10 years of industry experience, she leads the team with passion and a commitment to innovation.</p>
      </div>

      <div class="team-member">
        <h3>John Smith - Lead Developer</h3>
        <p>John brings cutting-edge development expertise to every project, ensuring high performance and scalability.</p>
      </div>

      <!-- Add more team members here -->
    </div>@endif
     @if($method_nm=='services')



      <section id="services" style='    padding-top: 300px;'>
      <h2>Services</h2>
      <div class="services">

        @if($students->isEmpty())
        <p>No student records found.</p>
    @else
        <table border="1" cellpadding="10" class='table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                    <!-- Add more fields as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td><a href="{{route('fetchData',['id'=>$student->id])}}"><input type='button' class='btn btn-success ' data-value='{{$student->id}}' value='Edit/Update' /></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        
        <div class="card">
          <h3>Web Development</h3>
          <p>We build fast, responsive, and secure websites and applications.</p>
        </div>
        <div class="card">
          <h3>UI/UX Design</h3>
          <p>Intuitive and beautiful interfaces focused on user experience.</p>
        </div>
        <div class="card">
          <h3>Digital Marketing</h3>
          <p>Grow your audience and reach the right customers through SEO, PPC, and social campaigns.</p>
        </div>
      </div>
    </section>
     @endif
     @if($method_nm=='Portfolio')
     <section id="portfolio">
      <h2>Portfolio</h2>
      <div class="portfolio">
        <div class="card">
          <h3>Project Alpha</h3>
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
     @endif
     @if($method_nm=='contactus')
      <section id="contact">
      <h2>Contact</h2>
      <form method="POST" action="#">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Your email" required>
        <textarea name="message" rows="5" placeholder="Your message..." required></textarea>
        <button type="submit">Send Message</button>
      </form>
    </section>
     @endif
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