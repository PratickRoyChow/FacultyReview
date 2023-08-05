@extends('layouts.app')

@section('content')
<div style="background-color: #f8f9fa; height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div style="max-width: 400px; width: 100%; padding: 20px; border: 1px solid #d1d1d1; border-radius: 5px; background-color: #ffffff;">
        <h2 style="text-align: center; margin-bottom: 20px;">Register</h2>

        <form method="POST" action="{{ route('submit_registration') }}">
            @csrf

            <div style="margin-bottom: 10px;">
                <label for="name">Name:</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="id">ID:</label>
                <input id="id" type="text" name="id" value="{{ old('id') }}" required style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="email">E-Mail:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required style="width: 100%; padding: 5px;">
            </div>

            <div style="margin-bottom: 10px;">
                <label for="major">Major:</label>
                <select id="major" name="major" required style="width: 100%; padding: 5px;">
                    @foreach ($majors as $major)
                        <option value="{{ $major }}">{{ $major }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit" style="background-color: #007bff; color: #ffffff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection
