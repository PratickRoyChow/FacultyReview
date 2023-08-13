<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Laravel</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Exo|Roboto);
        @import url(https://fonts.googleapis.com/css?family=Raleway:400,100);
        body {
            background-color:#34495E;
        }

        nav {
            text-align:right;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline-block;
            font-family: 'Raleway', sans-serif;
            margin: 5px 10px 0px 10px;
            padding-bottom: 15px;
            transition-duration: 0.3s;
            border-bottom: 1px transparent solid;
            cursor: pointer;
        }

        nav ul li a {
            text-decoration: none;
            color: #bdc3c7;
        }

        nav ul li:hover {
            border-bottom: 1px #16A085 solid;
            color: #ffffff;
        }

        #logo {
            margin: auto;
            margin-top: 5px;
            text-align: center;
        }

        .cygle {
            margin: auto;
            width: 150px;
            margin-bottom: 20px;
        }

        .row {

        }

        .dot {
            display: inline-block;
            border-radius: 100%;
            background-color: #16A085;
            padding: 10%;
            margin: 3%;
            transition-duration: 0.3s;
        }

        .dot.blue {
            background-color: #2980B9;
        }

        .dot.blue.light {
            background-color: #3498DB;
        }

        .dot.green {
            background-color: #16A085;
        }

        .dot.green.light {
            background-color: #1ABC9C;
        }

        h1 {
            vertical-align: middle;
            display: inline-block;
            text-align: center;
            font-size: 50px;
            color: #ecf0f1;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin-top: -10px;
        }

        h2 {
            vertical-align: middle;
            display: inline-block;
            text-align: center;
            font-size: 30px;
            color: #ecf0f1;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin-top: -10px;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button2 {
        background-color: white; 
        color: black; 
        border: 2px solid #008CBA;
        }

        .button2:hover {
        background-color: #008CBA;
        color: white;
        }
    </style>
</head>
<body>
    
<nav>
    <ul>
        <li><a href="{{ route('student_dashboard') }}"><i class="mdi mdi-compass"></i>Profile</a></li>
        <li><a href="{{ route('student_search') }}"><i class="mdi mdi-compass"></i>Search</a></li>
        <li><a href="{{ route('show_departments') }}"><i class="mdi mdi-compass"></i>Departments</a></li>
        @if(Auth::check() != true)
            <li><a href="{{ route('signin') }}"><i class="mdi mdi-account-box"></i> Sign In</a></li>
        @else
            <li><a href="{{ route('logout') }}"><i class="mdi mdi-account-box"></i> Sign Out</a></li>
        @endif
    </ul>
</nav>

<div id="logo">
    <h1>Welcome {{ $student->name }}!</h1>
</div>
<div id="logo">
    <h2>{{ $student->major }}</h2>
</div>
<div id="logo">
    <h2>{{ Auth::user()->email }}</h2>
</div>
<div id="logo">
    <h2>ID: {{ $student->id }}</h2>
</div>
<div id="logo">
    <a href="{{ route('edit_profile') }}"><button class="button button2" type="button">Edit Profile</button></a>
    <a href="{{ route('student_add_faculty') }}"><button class="button button2" type="button">Add Faculty</button></a>
    <a href="{{ route('student_add_course') }}"><button class="button button2" type="button">Add Course</button></a>
    <a href="{{ route('student_add_comment') }}"><button class="button button2" type="button">Add Comment</button></a>
</div>
</body>
</html>
