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
            text-align: left;
            padding-left: 20px;
            padding-top: 20px;
        }

        .cygle {
            margin: auto;
            width: 150px;
            margin-bottom: 20px;
        }

        .row {

        }

        .customDiv {
        border-radius: 5px;
        background-color: #f2f2f2;
        margin: auto;
        margin-top: 5px;
        padding-left: 20px;
        padding-top: 20px;
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
            margin-top: -30px;
        }

        h3 {
            vertical-align: middle;
            display: inline-block;
            text-align: center;
            font-size: 18px;
            color: #ecf0f1;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin-top: -30px;
        }

        .center-table {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50vh; /* Optional: This centers vertically as well */
        }

        .table-cell-beautify {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            color: #1fd7a6; /* Change this to your preferred text color */
            padding: 10px;
            margin: 20px;
            border: none; /* Add a border for a neat appearance */
        }

        input[type=text], input[type=email], input[type=textarea], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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

        a {
        text-decoration: none; /* Remove underlines from all links */
        color: inherit; /* Keep the link color as the parent element color */
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

{{-- <div class="center-table" style="margin-top: 100px">
    <table>
        <thead>
            <tr>
                <th><h2><strong>All Department faculties of {{ $department->dept_name }} ({{ $department->abbr_name }})</strong></h2></th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
            <tr>
                <td class="table-cell-beautify" style="font-size: 22px"><a href="route('show_faculty_info', $faculty->id)">{{ $faculty->name }}</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

<div id="logo">
    <h1> {{ $faculty->name }} [{{$faculty->initial}}]</h1>
</div>
<div id="logo" style="padding-top:0px">
    <h2> {{ $department->dept_name }}</h2>
</div>
<div id="logo" style="margin-top:30px">
    <h3> Bio: {{ $faculty->bio }}</h3>
</div>
<div class="customDiv">
    <form method="POST" action="{{ route('student_create_comment') }}">
    @csrf
        <input type="hidden" id="faculty_id" name="faculty_id" value="{{ $faculty->id }}" required>

        <div>
            <label for="comment">Comment:</label>
            <input id="comment" type="textarea" name="comment" value="" required>
        </div>

        <input id="student_id" type="hidden" name="student_id" value="{{ $student->id }}" required>

        @if ($errors->has('error'))
            <span role="alert" style="color: #FF0000; margin-top: 10px">
                <strong>{{ $errors->first('error') }}</strong>
            </span>
        @endif

        <div>
            <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Add Comment</button>
        </div>
    </form>
</div>
</body>
</html>
