@extends('layouts.app')

@section('content')
<div style="background-color: #f8f9fa; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="max-width: 400px; width: 100%; padding: 20px; border: 1px solid #d1d1d1; border-radius: 5px; background-color: #ffffff;">
        <h2 style="text-align: center; margin-bottom: 20px;">Login</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div style="margin-bottom: 10px;">
                <label for="email">E-Mail Address:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 5px;">
            </div>

            <!-- <div style="margin-bottom: 10px;">
                <label>User Role:</label>
                <div>
                    <input type="radio" name="role" value="student" checked> Student
                    <input type="radio" name="role" value="admin"> Admin
                </div>
            </div> -->

            <div>
                <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Login</button>
            </div>
        </form>

        @if (Route::has('password.request'))
            <div style="text-align: center; margin-top: 10px;">
                <a href="{{ route('password.request') }}" style="color: #007bff; text-decoration: none;">Forgot Your Password?</a>
            </div>
        @endif

        @if ($errors->has('login'))
            <span role="alert" style="color: #FF0000">
                <strong>{{ $errors->first('login') }}</strong>
            </span>
        @endif
    </div>
</div>
@endsection
