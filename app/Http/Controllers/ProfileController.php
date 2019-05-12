<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;

class ProfileController extends Controller
{
    public function updateProfile(Request $request){

        $user = Auth::User();
            $this->validate(request(),[
                //put fields to validate here
                'RegNo' => ['required', 'string', 'max:255', 'unique:students'],
                'phoneNo' => ['required', 'string', 'max:255', 'unique:students'],
                //'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $stud = new student();
                $stud->id = Auth::user()->id;
                $stud->Name = $user->name;
                $stud->RegNo = $request['RegNo'];
                $stud->email = $user->email;
                $stud->phoneNo = $request['phoneNo'];
                //save the data
                $stud->save();

                return redirect('/student/profile');


    }
}
