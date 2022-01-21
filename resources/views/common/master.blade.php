<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Employee Management System</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">
</head>

<body>
  <div class="container">
    <div class="clearFix">
      <div class="lf-nav">
        <a href="#home">
          <img src="{{ asset('images/' . 'ems.jpg') }}" alt="" width="330px" height="100px">
        </a>
      </div>
      <!-- Right-sided navbar links. Hide them on small screens -->
      <div class="rt-nav">
        <a href="#about">Employee Management</a>
        <a href="#menu">Salary Management</a>
        <a href="#contact">Leaves Management</a>
        <a href="#contact">Department Management</a>
      </div>
    </div>

@yield('content')
    <div class="footer-line">
      <div class="foot-border"></div>
    </div>
    <div class="copyright clearFix">
      <p class="p1">Copyright &copy; www.google.com. </p>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter-square"></i></a>
        <a href="#"><i class="fab fa-google-plus"></i></a>
        <p class="p2">
          All rights reserved | Web Design by <span>Group_B</span>
        </p>
      </div>
    </div>
  </div>
</body>

</html>