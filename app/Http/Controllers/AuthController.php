<?php
namespace App\Http\Controllers;
use App\Student; //using the Student Model in the Controller
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Flash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {   
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // $credentials = $request->only('email', 'password');

        $user = User::where('email',$request->email)->first();

        if($user == null){
            return redirect()->back()->withInput()->withErrors(['login' => 'User of this mail not found!']);
        }
        else{
            if($user->password == $request->password){
                Auth::login($user, true);
                return redirect()->route('student_dashboard');
            }
            else{
                return redirect()->back()->withInput()->withErrors(['login' => 'Wrong Password!']);
            }
        }
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

        return redirect()->route('home'); // Replace 'home' with the appropriate route name
    } catch (\Exception $e) {
        error_log('Registration Error: ' . $e->getMessage());

        return redirect()->back()->withErrors(['registration' => 'An error occurred during registration. Please try again.']);
    }
}

public function submit_registration(Request $request)
{
    $request->validate([
        'email' => 'required|unique:users|email',
        'password' => 'required|string',
        'id' => 'required|unique:student'
    ]);

    $user = new User;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->type = 'student';

    if($user->save()){
        $student = new Student;
        $student->name = $request->name;
        $student->id = $request->id;
        $student->user_id = $user->id;
        $student->major = $request->major;

        if($student->save()){
            $user = User::where('email',$request->email)->first();
            Auth::login($user, true);
            return redirect()->route('student_dashboard');
        }
    }
}

}
