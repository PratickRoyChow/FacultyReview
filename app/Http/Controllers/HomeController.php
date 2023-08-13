<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\User;
use App\Department;
use App\Faculty;
use App\Course;
use App\Comment;
use App\Major;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }
    
    public function student_dashboard() {
        $student = Student::where('user_id', Auth::user()->id)->first();
        return view('student.index', compact('student'));
    }
    public function edit_profile(){
        $student = Student::where('user_id', Auth::user()->id)->first();
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
        return view('student.student_edit_profile', compact('student', 'majors'));
    }

    public function update_student(Request $request, $id){
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->major = $request->major;

        if($student->save()){
            $user = User::findOrFail(Auth::user()->id);
            $user->email = $request->email;
            $user->password = $request->password;

            $user->save();
            return redirect()->route('student_dashboard');
        }
    }

    public function student_add_faculty(){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $departments = Department::get();
        return view('student.student_add_faculty', compact('departments', 'student'));
    }

    public function student_create_faculty(Request $request){
        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->bio = $request->bio;
        $faculty->initial = $request->initial;
        $faculty->dept_id = $request->dept_id;
        $faculty->student_id = $request->user_id;
        
        if($faculty->save()) return redirect()->route('student_dashboard');
        else return redirect()->back()->withInput()->withErrors(['error' => 'Faculty creation Failed!']);
    }

    public function student_add_course(){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $departments = Department::get();
        return view('student.student_add_course', compact('departments', 'student'));
    }

    public function student_create_course(Request $request){
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->dept_id = $request->dept_id;
        $course->student_id = $request->student_id;

        if($course->save()) return redirect()->route('student_dashboard');
        else return redirect()->back()->withInput()->withErrors(['error' => 'Course insertion failed!']);
    }

    public function student_add_comment(Request $request){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $faculties = Faculty::get();
        return view('student.student_add_comment', compact('faculties', 'student'));
    }

    public function student_create_comment(Request $request){
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->student_id = $request->student_id;
        $comment->faculty_id = $request->faculty_id;

        if($comment->save()) return redirect()->route('student_dashboard');
        else return redirect()->back()->withInput()->withErrors(['error' => 'comment insertion failed!']);
    }

    public function show_departments(Request $request){
        $departments = Department::get();
        return view('student.show_departments', compact('departments'));
    }

    public function show_department_info(Request $request, $id){
        $department = Department::findOrFail($id);
        return view('student.show_department_info', compact('department'));
    }

    public function department_all_courses(Request $request, $id){
        $department = Department::findOrFail($id);
        $courses = Course::where('dept_id', $id)->get();
        return view('department.department_all_courses', compact('courses', 'department'));
    }

    public function department_all_majors(Request $request, $id){
        $department = Department::findOrFail($id);
        $majors = Major::where('dept_id', $id)->get();
        return view('department.department_all_majors', compact('majors', 'department'));
    }

    public function department_all_faculty(Request $request, $id){
        $department = Department::findOrFail($id);
        $faculties = Faculty::where('dept_id', $id)->get();
        return view('department.department_all_faculties', compact('faculties', 'department'));
    }

    public function show_faculty_info(Request $request, $id){
        $student = Student::where('user_id', Auth::user()->id)->first();
        $faculty = Faculty::findOrFail($id);
        $department = Department::where('id', $faculty->dept_id)->first();
        return view('student.show_faculty_info', compact('faculty', 'department', 'student'));
    }

    public function student_search(){
        return view('student.student_search');
    }

    public function student_view_courses(Request $request){
        $courses = Course::leftJoin('department', 'courses.dept_id', '=', 'department.id')
                         ->select('courses.id', 'courses.course_code', 'courses.course_name', 'department.dept_name', 'courses.published');
    
        if ($request->has('course_code')) {
            $data['course_code'] = $request->course_code;
            $courses = $courses->where('courses.course_code', 'like', '%' . $request->course_code . '%');
        } else {
            $data['course_code'] = "";
        }
    
        if ($request->has('course_name')) {
            $data['course_name'] = $request->course_name;
            $courses = $courses->where('courses.course_name', 'like', '%' . $request->course_name . '%');
        } else {
            $data['course_name'] = "";
        }
    
        $courses = $courses->get();
        
        return view('student.student_view_courses', compact('courses', 'data'));
    }
    

    public function student_view_faculties(Request $request){
        $faculties = Faculty::leftJoin('department', 'faculty.dept_id', '=', 'department.id')
                         ->select('faculty.id', 'faculty.initial', 'faculty.name', 'department.dept_name', 'faculty.published');
    
        if ($request->has('initial')) {
            $data['initial'] = $request->initial;
            $faculties = $faculties->where('faculty.initial', 'like', '%' . $request->initial . '%');
        } else {
            $data['initial'] = "";
        }
    
        if ($request->has('name')) {
            $data['name'] = $request->name;
            $faculties = $faculties->where('faculty.name', 'like', '%' . $request->name . '%');
        } else {
            $data['name'] = "";
        }
    
        $faculties = $faculties->get();
        
        return view('student.student_view_faculties', compact('faculties', 'data'));
    }
}
