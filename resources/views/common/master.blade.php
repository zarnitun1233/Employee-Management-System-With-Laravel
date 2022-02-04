<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Employee Management System</title>
  <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  @yield('leaves')
  <link rel="stylesheet" href="{{ asset('css/all.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="common-nav">

@auth
@if (auth()->user()->role == 1)
<div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/employee/list') }}">Employee </a>
  <a href="{{ url('/salary/list') }}">Salary </a>
  <a href="{{ url('/leaves/list') }}">Leaves </a>
  <a href="{{ url('/department/list') }}">Department </a>
</div>
@else
<div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/leaves/user/'.auth()->user()->id) }}">Leaves List</a>
  <a href="{{ url('/leaves/create/'.auth()->user()->id) }}">Create Leaves</a>
  <a href="{{ url('/employee/edit/'.auth()->user()->id) }}">Edit Info</a>
</div>
@endif
@endauth
<div class="header">
  <h2>Employee Management System</h2>
</div>
  <div class="nav clearFix">
    @auth
    <div class="lf-nav clearFix">
      <span style="cursor:pointer" onclick="openNav()">&#9776; Management</span>
    </div>
    @endauth
    @auth
    <div class="rt-nav clearFix">
      <ul>
        <li><a href="{{ url('/employee/list/' . auth()->user()->id) }}">Profile <i class="fas fa-user-circle"></i></a>
        </li>
        <li><a href="{{ url('/logout') }}">Logout <i class="fas fa-sign-out-alt"></i></a>
        </li>
      </ul>
     
    </div>
    @endauth
  </div>

@yield('content')
    <div class="footer-line">
      <div class="foot-border"></div>
    </div>
    <div class="copyright clearFix">
      <p class="p1">Copyright &copy; www.google.com. </p>
      <div class="social-icons clearFix">
        <div class="icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter-square"></i></a>
        <a href="#"><i class="fab fa-google-plus"></i></a>
        </div>
        <p class="p2">
          All rights reserved | Web Design by <span>Group_B</span>
        </p>
      </div>
    </div>
  </div>
  <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
</body>

</html>