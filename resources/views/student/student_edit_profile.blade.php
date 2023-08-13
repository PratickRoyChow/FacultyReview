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

        h3 {
            vertical-align: middle;
            display: inline-block;
            text-align: center;
            font-size: 18px;
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

        input[type=text], input[type=email], select {
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

.customDiv {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
    </style>
</head>
<body>
    
<div>
    <nav>
        <ul style="text-align: right">
            <li><a href="{{ route('student_dashboard') }}"><i class="mdi mdi-compass"></i>Profile</a></li>
            <li><a href="{{ route('student_search') }}"><i class="mdi mdi-compass"></i>Search</a></li>
            <li><a href="{{ route('show_departments') }}"><i class="mdi mdi-compass"></i>Departments</a></li>
            @if(Auth::check() != true)
                <li><a href="{{ route('signin') }}"><i class="mdi mdi-account-box"></i> Sign In</a></li>
            @else
                <li><a href="{{ route('logout') }}"><i class="mdi mdi-account-box"></i> Sign Out</a></li>
            @endif
        </ul>
        <h3><strong>Profile Edit Form of {{ $student->name }}</strong></h3>
    </nav>
</div>
<div class="customDiv">
    <form method="POST" action="{{ route('update_student', $student->id) }}">
    @csrf
        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ $student->name }}" required>
        </div>

        <div>
                <label for="major">Major:</label>
                <select id="major" name="major" required>
                    @foreach ($majors as $major)
                        <option @if($student->major == $major) selected @endif value="{{ $major }}">{{ $major }}</option>
                    @endforeach
                </select>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" required>
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="text" name="password" value="{{ Auth::user()->password }}" required>
        </div>

        <div>
            <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Update Profile</button>
        </div>
    </form>
</div>
</body>
</html>
