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
        $schedule = Schedule::where('for_period', 'pending review')->get();

        return view('pages.schedule');
    }

    public function setSchedule(Request $request)
    { 
        $this->validate(request(),[
            "day1"=> 'required',
            "day2"=> 'required',
            "day3"=> 'required',
            "day4"=> 'required',
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
    }
}



