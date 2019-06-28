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

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    //
    public function index()
    {
        $schedules = Schedule::get();
        $schedules = Schedule::where('for_period', 'pending review')->get();


        $for_period = Carbon::now()->format('Y M');

        $schedule = Schedule::where('for_period', $for_period)->get();

        //return view('pages.schedule');
        return view('pages.schedule', compact('schedule','for_period'));
    }

    public function setSchedule(Request $request)
    { 
        $today = strtotime("now");
        $this->validate(request(),[
            "day1"=> 'required|date|after:today',
            "day2"=> 'required|date|after:today',
            "day3"=> 'required|date|after:today',
            "day4"=> 'required|date|after:today',
           // "desc"=> 'required'
        ]);

       # $oldestId  = complaint::whereIn('id', function($query){
            #$query->select('id')->where('created_at', DB::raw("(select max('created_at') from complaints)"));
           # })->orderBy('id', 'desc')->first();
            //earliest yy/mm the first complaint was ever filed
           # $earliestTS = complaint::oldest('created_at')->get()->first();
          # $earliestTS = (string) DB::table('complaints')->orderBy('created_at', 'desc')->first();
            #$earliestYear = Carbon::createFromFormat('Y-m-d H:i:s', $earliestTS)->year;
            #$earliestMonth = Carbon::createFromFormat('Y-m-d H:i:s', $earliestTS)->month;
            //current yy/mm
            $currentTime = Carbon::now();
            $currentYear = Carbon::createFromFormat('Y-m-d H:i:s', $currentTime)->year;
            $currentMonth = Carbon::createFromFormat('Y-m-d H:i:s', $currentTime)->month;
            $for_period = Carbon::now()->format('Y M');
        //get range of dates in last month
      //  $lastMonth 
      $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
      $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        //retreive an array of departments with their total number of complaints in desc.
       // $complaints_no_desc = complaint::groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
     
      $lastMonthEntries = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department')->get();
      $thisMonthEntries = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department')->get();
     // $complaints_no_desc = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
       #$i = 0;
      # $i <= 3;
      # $complaintsInDec = array(0,0,0,0);
       #foreach($complaints_no_desc as $compl ){
        #  $complaintsInDec[$i] = $compl;
        #  $i = $i + 1;
     # }
     // if($lastMonthEntries != null){}

       #\ $complaints_no_desc[4] = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
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

     //if there are no entries from last month
      if(sizeof($lastMonthEntries)==0){
        $complaints_no_desc = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department', DB::raw('count(*) AS total'))->orderBy('total', 'desc')->get();
        $i = 0;
        $i <= 3;
        $complaintsInDec = array(0,0,0,0);
        foreach($complaints_no_desc as $compl ){
           $complaintsInDec[$i] = $compl;
           $i = $i + 1;
       }
          //if size of  complaints_no_desc == 4
       if(sizeof($complaints_no_desc)==4){
        $schedules = array(
            array('for_period'=> $for_period,'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => $complaints_no_desc[3]->department)
        ); 
        Schedule::insert($schedules);
       }

       //if size of  complaints_no_desc == 3
       elseif(sizeof($complaints_no_desc)==3){
        if(! in_array('accomodation', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    elseif(! in_array('security', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
                        ); 
                        Schedule::insert($schedules);
                    }
                    elseif(! in_array('catering', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'catering')
                        ); 
                        Schedule::insert($schedules);                         
                    }
                    elseif(! in_array('disability', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'disability')
                        ); 
                        Schedule::insert($schedules);
        
       }
    }
       //if size of  complaints_no_desc == 2
       elseif(sizeof($complaints_no_desc)==2){
        if( ! in_array('catering', $complaintsInDec) && ! in_array('disability', $complaintsInDec) ){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'catering')
            ); 
            Schedule::insert($schedules);

           
        }

        elseif(! in_array('accomodation', $complaintsInDec) && ! in_array('disability', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    
        elseif(!in_array('security', $complaintsInDec) && !in_array('disability', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
           // return 'I am here';
        }
        elseif(! in_array('catering', $complaintsInDec) && ! in_array('accomodation', $complaintsInDec) ){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
        elseif(! in_array('catering', $complaintsInDec) && ! in_array('security', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(! in_array('accomodation', $complaintsInDec) && ! in_array('security', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
    }
       //if size of  complaints_no_desc == 1
       elseif(sizeof($complaints_no_desc)==1){
       if( in_array('security', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'security'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
    }

    elseif(in_array('accomodation', $complaintsInDec)){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('catering', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('disability', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
}

       //if size of  complaints_no_desc == 0
       else{
        $schedules = array(
            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'disability'),
            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'catering'),
            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
        ); 
        Schedule::insert($schedules);
    }
 
   
   /* if(in_array('disability', $complaintsInDec)){
        return  sizeof($complaints_no_desc); }
        elseif(! in_array('disability', $complaintsInDec)){
         return  sizeof($complaints_no_desc); }
        else{
            return 'FUCK';
        }
*/

        }
    
      //when there are entries from last month
      else{
        $complaints_no_desc = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department', DB::raw('count(*) AS total'))->orderBy('total', 'desc')->get();
        $i = 0;
        $i <= 3;
        $complaintsInDec = array();
        foreach($complaints_no_desc as $compl ){
           $complaintsInDec[$i] = $compl->department;
           $i = $i + 1;
       }
     /*   
      if(in_array('disability', $complaintsInDec)){
       return 'YES'; }
       elseif(! in_array('disability', $complaintsInDec)){
        return 'NO'; }
       else{
           return 'FUCK';
       }*/

       //if size of  complaints_no_desc == 4
       if(sizeof($complaints_no_desc)==4){
        $schedules = array(
            array('for_period'=> $for_period,'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => $complaints_no_desc[3]->department)
        ); 
        Schedule::insert($schedules);
       }

       //if size of  complaints_no_desc == 3
       elseif(sizeof($complaints_no_desc)==3){
        if(! in_array('accomodation', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    elseif(! in_array('security', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
                        ); 
                        Schedule::insert($schedules);
                    }
                    elseif(! in_array('catering', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'catering')
                        ); 
                        Schedule::insert($schedules);                         
                    }
                    elseif(! in_array('disability', $complaintsInDec)){
                        $schedules = array(
                            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'disability')
                        ); 
                        Schedule::insert($schedules);
        
       }
    }
       //if size of  complaints_no_desc == 2
       elseif(sizeof($complaints_no_desc)==2){
        if( ! in_array('catering', $complaintsInDec) && ! in_array('disability', $complaintsInDec) ){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'catering')
            ); 
            Schedule::insert($schedules);

           
        }

        elseif(! in_array('accomodation', $complaintsInDec) && ! in_array('disability', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    
        elseif(!in_array('security', $complaintsInDec) && !in_array('disability', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
           // return 'I am here';
        }
        elseif(! in_array('catering', $complaintsInDec) && ! in_array('accomodation', $complaintsInDec) ){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
        elseif(! in_array('catering', $complaintsInDec) && ! in_array('security', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(! in_array('accomodation', $complaintsInDec) && ! in_array('security', $complaintsInDec)){
            $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
    }
       //if size of  complaints_no_desc == 1
       elseif(sizeof($complaints_no_desc)==1){
       if( in_array('security', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'security'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
    }

    elseif(in_array('accomodation', $complaintsInDec)){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('catering', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('disability', $complaintsInDec) ){
        $schedules = array(
                array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'disability'),
                array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'catering'),
                array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
}

       //if size of  complaints_no_desc == 0
       else{
        $schedules = array(
            array('for_period'=> $for_period, 'visit_on' => $request['day1'], 'department' => 'disability'),
            array('for_period'=> $for_period, 'visit_on' => $request['day2'], 'department' => 'catering'),
            array('for_period'=> $for_period, 'visit_on' => $request['day3'], 'department' => 'accomodation'),
            array('for_period'=> $for_period, 'visit_on' => $request['day4'], 'department' => 'security')
        ); 
        Schedule::insert($schedules);
    }
 
   
   /* if(in_array('disability', $complaintsInDec)){
        return  sizeof($complaints_no_desc); }
        elseif(! in_array('disability', $complaintsInDec)){
         return  sizeof($complaints_no_desc); }
        else{
            return 'FUCK';
        }
*/

        }
    
     

       
       
     
      
    return redirect('get_scheduled');
    }

    public function showSchedule()
    {
        # code...
        $for_period = Carbon::now()->format('Y M');

        $schedule = Schedule::where('for_period', $for_period)->get();
       // return $shedule;

        return view('pages.schedule', compact('schedule','for_period'));
       // return view('pages.schedule')->with('for_period', $for_period)->with('schedule', $schedule);
    }

    public function updateSchedule(Request $request)
    {
        $for_period = Carbon::now()->format('Y M');
        //return $request['dept1'];
       if($request['date1'] != null){
           $dept = $request['dept1'];
           //return $dept;
           $sched1 = Schedule::where([ ['department','=', $dept],['for_period', $for_period] ])->first();
           $sched1->visit_on = $request['date1'];
           $sched1->save();
       }

       if($request['date2'] != null){
        $sched2 = Schedule::where([ ['department', $request['dept2']],['for_period', $for_period] ])->first();
        $sched2->visit_on = $request['date2'];
        $sched2->save();
    }
    if($request['date3'] != null){
        $sched3 = Schedule::where([ ['department', $request['dept3']],['for_period', $for_period] ])->first();
        $sched3->visit_on = $request['date3'];
        $sched3->save();
    }
    if($request['date4'] != null){
        $sched4 = Schedule::where([ ['department', $request['dept4']],['for_period', $for_period] ])->first();
        $sched4->visit_on = $request['date4'];
        $sched4->save();
    } 
        return  redirect('get_scheduled');
    }

    public function showReports()
    {
        $shedReports = Schedule::where('report', '!=', NULL)->get();
        $dueReports = Schedule::where('report', '=', NULL)->get();

        return view('pages.reports')->with('SchedReports', $shedReports)
                                    ->with('dueReports', $dueReports);
    }

    public function viewSpecificReport($id)
    {
        $scheduleReport = Schedule::find($id);
        return view('pages.viewReport' ,compact('scheduleReport'));
    }

    public function reportEditor($id)
    {
        $report = Schedule::find($id);
        return view('pages.addReport')->with('report', $report);
    }

    public function addReport(Request $request, $id)
    {
        $schedule = Schedule::where('id',$id)->first();

        $this->validate(request(),[
            'report'=>['required','string', 'min:25' ]
        ]);

        $schedule->report = $request['report'];
        $schedule->submitted_by = Auth::User()->name;
        $schedule->submitted_at = Carbon::now()->format('Y'.'-'.'m'.'-'.'d');
        $schedule->save();

        return redirect('/reports')->with('success', 'Report submitted successfully.');

    }
}



