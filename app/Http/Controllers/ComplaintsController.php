<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;
use App\complaint;
use App\Appointment;
use Carbon\Carbon;



class ComplaintsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //post complaint
    public function PostComplaint(Request $request)
    {
        $this->validate(request(),[
            "department"=> 'required',
            "desc"=> 'required'
        ]);
        $complaint = new complaint();
        $user = Auth::User();
        $id = $user->id;
        $stud = student::find($id);
        $complaint->details = $request['desc'];
        $complaint->studReg = $stud->RegNo;
        $complaint->department = $request['department'];
        $complaint->SolvedBy = 'pending';
        $complaint->status = 'pending review';
        $complaint->save();

        return redirect('/student/{id}/my_hist')->with('success', 'Case created successfully');
        
    }

    public function studentHistory()
    {
        # code...
       // $complaints = complaint::all();
        $user = Auth::User();
        $id = $user->id;
        $student = student::find($id);
        $studReg = $student->RegNo;
        $myComplaint = complaint::where('StudReg',$studReg)->get();

        return view('pages.studentHistory')->with('myComplaint', $myComplaint);
        
    }

    public function showCaseForStudent($id)
    {
       $case = complaint::find($id);
       if($case->status == 'Open'){
             $director = User::find($case->SolvedBy);
             return view('pages.studentSpecificComplaint')->with('thisCase', $case)->with('director', $director);
       } else{
        return view('pages.studentSpecificComplaint')->with('thisCase', $case);
       }
      
      // $thisComplaint = 'Hey You';//complaint::where('id', $id)->get();
        
       //return view('pages.studentSpecificComplaint')->with('thisCase', $case)->with('director', $director);
    }

    public function ChangeStatusToOpen($id)
    {
        $admin = Auth::User()->id;
        complaint::where('id', $id)->update(array('status'=>'Open','SolvedBy'=>$admin));
       // return redirect('/case/handler/{id}/show');
       $thisCase = complaint::find($id);
       $stud = student::where('RegNo', $thisCase->studReg)->first();
       return view('pages.adminSpecificCase')->with('thisCase',$thisCase)->with('stud', $stud);

    }

    public function ShowCaseForAdmin($id)
    {

        $thisCase = complaint::find($id);
        $stud = student::where('RegNo', $thisCase->studReg)->first();
        return view('pages.adminSpecificCase')->with('thisCase',$thisCase)->with('stud', $stud);
       // $thisComplaint = complaint::find($id);
       // $stud = student::where('RegNo', $thisComplaint->studReg)->get();
       // return view('pages.adminSpecificCase')->with('thisComplaint',$thisComplaint)->with('stud', $stud);
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

    public function close(Request $request, $id)
    {
       //return $id;
        $this->validate(request(),[
            "action"=> 'required'
        ]);

            $thisComp = complaint::find($id);
           
            $thisComp->update(array('status'=>'Closed','corrective_action'=>$request['action'],'closed_at'=> Carbon::now()->format('Y'.'-'.'m'.'-'.'d')));
            return redirect('/case/handler/'.$id.'/show');
    }
}
