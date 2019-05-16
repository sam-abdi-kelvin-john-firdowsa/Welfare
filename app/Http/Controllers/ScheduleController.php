<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Calendar;
use Auth;
use DB;
use Carbon\Carbon;
use App\Schedule;
use App\complaint;

class ScheduleController extends Controller
{
    //
    public function index()
    {
        $schedule = Schedule::get();

        return view('pages.schedule');
    }

    public function setSchedule(Request $request)
    { 
        $this->validate(request(),[
            "day1"=> 'required',
           // "desc"=> 'required'
        ]);

        //get range of dates in last month
      //  $lastMonth 
      $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
      $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        //retreive an array of departments with their total number of complaints in desc.
       // $complaints_no_desc = complaint::groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
     
      $complaints_no_desc = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
      #$complaints_no_desc = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
       $i = 0;
       $i <= 3;
       $complaintsInDec = array(0,0,0,0);
       foreach($complaints_no_desc as $compl ){
          $complaintsInDec[$i] = $compl;
          $i = $i + 1;


      }
       # $complaints_no_desc[4] = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
       /* 
       $schedules = array(
        array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
        array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
        array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
        array('visit_on' => $request['day4'], 'department' => $complaints_no_desc[3]->department)
    ); 
    Schedule::insert($schedules); */
       
      // $d1 = $complaints_no_desc[0]->department;
       
       //$d2 = $complaints_no_desc[1]->department;
       //$d3 = $complaints_no_desc[2]->department;
       //$d4 = $complaints_no_desc[3]->department;
    
       return $complaintsInDec[0];


        $shedule = new Schedule;

       
     
        
        //return redirect('schedule');
    }
}
