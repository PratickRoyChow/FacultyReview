<?php
namespace App\Http\Controllers;
use App\Student; //using the Student Model in the Controller
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/'); // Change this to the desired destination after login
        }

        return redirect()->back()->withInput()->withErrors(['login' => 'Invalid login credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function showRegistrationForm()
{
    $majors = [
        'Computer Science and Engineering',
        'Computer Science',
        'Electrical and Electronic Engineering',
        'Electronic and Communication Engineering',
        'BBA (Accounting)',
        'BBA (Finance)',
        'BBA (HRM)',
        'Microbiology',
        'Biotechnology',
        'Physics',
        'Applied Physics and Electronics',
        'Mathematics',
        'MBA (Marketing)'
    ];

    return view('register', compact('majors'));
}

public function register(Request $request)
{
    try {
        \Illuminate\Support\Facades\DB::table('student')->insert([
            'name' => $request->name,
            'id' => $request->id,
            'email' => $request->email,
            'password' => \Illuminate\Support\Facades\Hash::make($request->password),
            'major' => $request->major,
        ]);

        return redirect()->route('/'); // Replace 'home' with the appropriate route name
    } catch (\Exception $e) {
        error_log('Registration Error: ' . $e->getMessage());

        return redirect()->back()->withErrors(['registration' => 'An error occurred during registration. Please try again.']);
    }
}

public function submit_registration(Request $request)
{
    
    $student = new Student;
    $student->name = $request->name;
    $student->id = $request->id;
    $student->email = $request->email;
    $student->password = $request->password;
    $student->major = $request->major;

    $student->save();
}

}
