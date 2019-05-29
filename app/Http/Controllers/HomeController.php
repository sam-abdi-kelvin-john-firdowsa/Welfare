<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\student;
use App\User;
use App\complaint;
use App\Appointment;
use Calendar;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $id = Auth::User()->id;
        $student = student::where('id', $id)->get();
        $complaints = complaint::where('status', 'pending review')->get();
        $now = Carbon::now();
       // $CurrentYYYMMDD = Carbon::createFromFormat('Y-m-d', '$now');
       $CurrentYYYMMDD = $now->format("Y-m-d");
       $CurrentHHMMSS =$now->format("H:i:s");
      
                if(Auth::User()->isAdmin==0){
                    $appointments= Appointment::where([ [DB::raw('YEAR(created_at)'),'=', $now->year],
                    ['regNo', '=', $student[0]->RegNo],
                    [  'date','>=' ,$CurrentYYYMMDD],
                    ['timeIn','>=', $CurrentHHMMSS]])->get(); 

                    return view('home')->with('complaints', $complaints)
                    ->with('appointments', $appointments)
                   ->with('student', $student); 

                }

                else{
                    return view('home')->with('complaints', $complaints)
                                     ->with('student', $student); 
                }
        // $student;
      // return $appointments;
     
       
    }



  /*  public function index()
   * {
    *    return view('home');
    *}
    */

    public function admin()
    { 
        return view('pages.adminDash');
    }

    public function adminProf()
    { 
        return view('pages.adminProfile');
    }

    public function adminHist()
    { 
        return view('pages.adminHistory');
    }
}

   