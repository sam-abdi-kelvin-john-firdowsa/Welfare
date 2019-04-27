<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class pagesController extends Controller
{
    //
    public function studentDash($id){
        $students = student::find($id);
        return view('pages.studentDash')->with('students', $students);
    }

    public function studentComplaint($id){
        return view('pages.studentComplaint');
    }

    public function studentProfile($id){
        return view('pages.studentProfile');
    }

    public function studentHistory($id){
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



}
