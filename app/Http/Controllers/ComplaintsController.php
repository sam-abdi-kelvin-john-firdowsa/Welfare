<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;
use App\complaint;


class ComplaintsController extends Controller
{
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
      // $thisComplaint = 'Hey You';//complaint::where('id', $id)->get();
        
       return view('pages.studentSpecificComplaint')->with('thisCase', $case);
    }

    public function ChangeStatusToOpen($id)
    {
        $admin = Auth::User()->id;
        complaint::where('id', $id)->update(array('status'=>'Open','SolvedBy'=>$admin));
       // return redirect('/case/handler/{id}/show');
       $thisCase = complaint::find($id);
       return view('pages.adminSpecificCase')->with('thisCase',$thisCase);

    }

    public function ShowCaseForAdmin($id)
    {
        $thisComplaint = complaint::find($id);
        return view('pages.adminSpecificCase')->with('thisComplaint',$thisComplaint);
    }
}