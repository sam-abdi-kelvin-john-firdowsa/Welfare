<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;
use App\Appointment;

class AppointmentController extends Controller
{  



    public function __construct()
    {
        $this->middleware('auth');
    }


    //
    public function book()
    {
        $user = Auth::user();
        $id = Auth::user()->id;
        $student = student::find($id);
        $admin = User::where('isAdmin', '=' , '1')->orderBy('id')->get();
       // return $admin;
        //return $student;
        return view('pages.bookAppointment')->with('student', $student)->with('admin', $admin);
    }

    public function SetAppointment(Request $request)
    {
        $this->validate(request(),[
            "name"=> 'required',
            "phone"=> 'required',
            "reg"=> 'required',
            "officer"=> 'required',
            "purpose"=> 'required',
            "date"=> 'required',
            "time"=> 'required'
        ]);
 
       
        
        $appo = new Appointment();
        $appo->date = $request['date'];
        $appo->name = $request['name'];
        $appo->mobileNo = $request['phone'];
        $appo->regNo = $request['reg'];
        $appo->officerToSee = $request['officer'];
        $appo->reasonForVisit = $request['purpose'];
        $appo->timeIn = $request['time'];
        $appo->status = 'pending';
        $appo->comments = 'pending review';
        //save the data
        $appo->save();

        return redirect('/student/book_appointment')->with('success', 'Apointment booked successfully');



    }


    

    public function appointments()
    {

        $appointments = Appointment::where('status', '=', 'pending')->orderBy('created_at','asc' )->get();
       // $director = User::where('id', $appointments->officerToSee)->first();
        return view('pages.handleAppointments')->with('appointments', $appointments);
    }

    public function respond($id)
    {
        $thisAppo = Appointment::find($id);

        $director = User::where('id', $thisAppo->officerToSee)->first();

        return view('pages.respondAppointment')->with('appoint', $thisAppo)->with('director', $director);
    }

    public function sendResponse(Request $request, $id)
    {
        $this->validate($request, [
            'response'=>'required|min:5'
        ]);
        $thisApp = Appointment::find($id);

        switch($request->get('submitbutton')){
            case 'ACCEPT':
            $thisApp->comments = $request->input('response');
            $thisApp->status = "ACCEPTED";
            $thisApp->save();
           

            break;

            case 'DECLINE':
            $thisApp->comments = $request->input('response');
            $thisApp->status = "DECLINED";
            $thisApp->save();
           

            break;
        }

       // return  $thisApp;
        return redirect('/front_office/appointments');

    }
}
