<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;


class pagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //
    public function studentDash($id){
        $students = student::find($id);
        return view('pages.studentDash')->with('students', $students);
    }

    public function studentComplaint($id){
        $user = Auth::user();
        $id = Auth::user()->id;
        $student = student::find($id);
        if($student == null){
            return redirect('/student/complete_reg')->with('error', 'please update your profile first before continuing.');
        }

        return view('pages.studentComplaint');
    }

    public function studentProfile(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $student = student::find($id);
        if($student == null){
            return redirect('/student/complete_reg')->with('error', 'please update your profile first before continuing.');
        }
        return view('pages.studentProfile')->with('studentUser',['userT' => $user, 'studentT' => $student] );
    }
    
    public function studentCompleteReg() {
        $user = Auth::user();
        return view('pages.studentCompleteRegistration')->with('user',$user);
    }

    public function studentProfileupdt(){
        $user = Auth::user();
        return view('pages.studUpdateprof')->with('user',$user);
    }


    public function studentHistory($id){
        $user = Auth::user();
        $id = Auth::user()->id;
        $student = student::find($id);
        if($student == null){
            return redirect('/student/complete_reg')->with('error', 'please update your profile first before continuing.');
        }
        return view('pages.studentHistory');
    }

    public function student_rating($id){
        return view('pages.studentRating');
    }

    
    public function student_help($id){
        return view('pages.studentHelp');
    }

    
    public function about(){
        return view('pages.about');
    }

    public function showSpecificComplaint(){
        return view('pages.specificComplaint');
    }



}
