<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;

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

    public function studentProfile(){
        $user = Auth::user();
        $id = Auth::user()->id;
        $student = student::find($id);
        return view('pages.studentProfile')->with('studentUser',['userT' => $user, 'studentT' => $student] );
    }

    public function studentProfileupdt(){
        return view('pages.studUpdateprof');
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

    public function showSpecificComplaint(){
        return view('pages.specificComplaint');
    }



}
