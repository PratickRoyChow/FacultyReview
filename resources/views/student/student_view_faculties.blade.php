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
table{
  width: 100%;
  border-collapse: collapse;
  text-align: left;
  overflow: hidden;
  
 td, th{
    border-top: 1px solid #ECF0F1;
    padding: 10px;
  }
  
  td{
    border-left: 1px solid #ECF0F1;
    border-right: 1px solid #ECF0F1;
  }
  
  th{
    background-color: #4ECDC4;
  }
  
  tr:nth-of-type(even) td{
    background-color: lighten(#4ECDC4, 35%);
  }
  
  .total{
    th{
      background-color: white;
    }
    
    td{
      text-align: right;
      font-weight: 700;
    }
  }
}

  .mobile-header{
    display: none;
  }

@media only screen and (max-width: 760px){
  p{
    display: block;
    font-weight: bold;
  }
  
  table{
    tr{
      td:not(:first-child), th:not(:first-child), td:not(.total-val){
        display: none;
      }
      
      &:nth-of-type(even) td:first-child{
        background-color: lighten(#4ECDC4, 35%);
      }
      &:nth-of-type(odd) td:first-child{
        background-color: white;
      }
      
      &:nth-of-type(even) td:not(:first-child){
        background-color: white;
      }
      
      th:first-child{
        width: 100%;
        display:block;
      }
      
      th:not(:first-child){
        width: 40%;
        transition: transform 0.4s ease-out;
        transform:translateY(-9999px);
        position: relative;
        z-index: -1;
      }
      
      td:not(:first-child){
        transition: transform 0.4s ease-out;
        transform:translateY(-9999px);
        width: 60%;
        position: relative;
        z-index: -1;
      }
      
      td:first-child{
        display: block;
        cursor: pointer;
      }
      
      &.total th{
        width: 25%;
        display: inline-block;
      }
      
      td.total-val{
        display: inline-block;
        transform: translateY(0);
        width: 75%;
      }
    }
  }
}

@media only screen and (max-width: 300px){
  table{
    tr{
      th:not(:first-child){
        width: 50%;
        font-size: 14px;
      }
      
      td:not(:first-child){
        width: 50%;
        font-size: 14px;
      }
    }
  }
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
<div id="logo">
    <form action="" id="sort_orders" method="GET">
        <label for="name">Faculty Name</label>
        <input type="text" name="name" id="name" value="{{ $data['name'] }}">
        <label for="initial">Faculty Initials</label>
        <input type="text" name="initial" id="initial" value="{{ $data['initial'] }}">
        <button type="submit">Filter</button>
    </form>
</div>
<div style="margin-top: 80px">
    <table>
        <thead>
            <tr class="table-headers">
                <th><strong>ID</strong></th>
                <th><strong>Faculty Name</strong></th>
                <th><strong>Initials</strong></th>
                <th><strong>Dept Name</strong></th>
                <th><strong>Published</strong></th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
            <tr>
                <td>{{ $faculty->id }}</td>
                <td>{{ $faculty->name }}</td>
                <td>[{{ $faculty->initial }}]</td>
                <td>{{ $faculty->dept_name }}</td>
                @if($faculty->published == 1) 
                <td>Yes</td>
                @else    
                <td>No</td>    
                @endif
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>