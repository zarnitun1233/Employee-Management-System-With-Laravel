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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="common-nav">

<div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="{{ url('/employee/list') }}">Employee </a>
  <a href="{{ url('/salary/list') }}">Salary </a>
  <a href="{{ url('/leaves/list') }}">Leaves </a>
  <a href="{{ url('/department/list') }}">Department </a>
</div>
<div class="header">
  <h2>Employee Management System</h2>
</div>
  <div class="nav clearFix">
    <div class="lf-nav clearFix">
      <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Management</span>
    </div>
    <div class="rt-nav clearFix">
      <ul>
        <li><a href="" style="font-size:23px">Profile <i class="fa fa-user-circle-o"></i></a>
        </li>
        <li><a href="" style="font-size:23px">Logout <i class="fa fa-sign-out"></i></a>
        </li>
      </ul>
     
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