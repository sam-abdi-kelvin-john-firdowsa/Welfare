<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

    public function studentProfileupdt(){ //returns view for editing existing stud profile
        $user = Auth::user();
        $id = $user->id;
        $student = student::find($id);
        return view('pages.studUpdateprof')->with('user',$user)->with('student', $student);
    }

    public function actuallyUpdateStdProf(Request $request) //this is for changing existing profile
    {
        $id = Auth::User()->id;


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











    public function editProfile(Request $request)
    {
        //return 'im editing';
        //return $request;
        $user = Auth::User();
        $id = Auth::user()->id;
       
       // return $student;

       

        //if the image has been changed
        if($request['profilePic'] != null){
        if($request->hasFile('profilePic')){
           // return 'i am not null';
            $student = student::where('id','=' ,$id)->first();

            $oldPic = $student->profilePic;
            Storage::delete('public/profilePictures/'.$oldPic);

             //get file name with extension
             $filenameWithExt = $request->file('profilePic')->getClientOriginalName();

             //get file name only
             $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

             //get extension only
             $ext =  $request->file('profilePic')->getClientOriginalExtension();

             //filenameToStore
             $filenameToStore = $filename.'_'.time().'.'.$ext;

             //store the image
             $path = $request->file('profilePic')->storeAs('public/profilePictures', $filenameToStore);

             $student->profilePic = $filenameToStore;
             $student->Name = $user->name;
             $student->RegNo = $request['RegNo'];
             $student->email = $user->email;
             $student->phoneNo = $request['phoneNo'];
             $student ->save();

        }
    } 

    if($request['profilePic'] == null){

        //return $request['phoneNo'];

        $student = student::where('id','=' ,$id)->first();

        $student->Name = $user->name;
        $student->RegNo = $request['RegNo'];
        $student->email = $user->email;
        $student->phoneNo = $request['phoneNo'];
       
        //save the data
        $student->save();
    }

        return redirect('/student/profile');
    }



}
