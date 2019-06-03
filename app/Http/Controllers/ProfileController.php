<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\student;
use App\User;

class ProfileController extends Controller
{ 

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateProfile(Request $request){ //this is for feeding new data to the student table

        $user = Auth::User();
        $id = Auth::user()->id;
        $student = student::find($id);

            $this->validate(request(),[
                //put fields to validate here
                'RegNo' => ['required', 'string', 'max:14', 'unique:students'],
                'phoneNo' => ['required', 'string', 'max:13', 'min:10','unique:students'],
                'profilePic' => ['image','nullable','max:1999']

                //'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
//handle file upload
if($student == null){

            if($request->hasFile('profilePic')){
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


            } else{
                $filenameToStore = 'noImage.jpg';
            }


            $stud = new student();
                $stud->id = Auth::user()->id;
                $stud->Name = $user->name;
                $stud->RegNo = $request['RegNo'];
                $stud->email = $user->email;
                $stud->phoneNo = $request['phoneNo'];
                $stud->profilePic = $filenameToStore;
                //save the data
                $stud->save();
        }

                return redirect('/student/profile');


    }

    public function editProfile(Request $request)
    {
        //return 'im editing';
        //return $request;
        $user = Auth::User();
        $id = Auth::user()->id;
        $student = student::find($id);

        $this->validate(request(),[
            'RegNo' => ['required', 'string', 'max:14', 'unique:students'],
            'phoneNo' => ['required', 'string', 'max:13', 'min:10','unique:students'],
            'profilePic' => ['image','nullable','max:1999']

        ]);

        //if the image has been changed
        if($request['profilePic'] != null){
        if($request->hasFile('profilePic')){

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

    if($request['profilePic'] != null){

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
