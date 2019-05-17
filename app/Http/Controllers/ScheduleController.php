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
        //get range of dates in last month
      //  $lastMonth 
      $firstDayOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString();
      $lastDayOfLastMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        //retreive an array of departments with their total number of complaints in desc.
       // $complaints_no_desc = complaint::groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
     
      $lastMonthEntries = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department')->get();
      $thisMonthEntries = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department')->get();
     # $complaints_no_desc = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
      # $i = 0;
     #  $i <= 3;
      # $complaintsInDec = array(0,0,0,0);
      # foreach($complaints_no_desc as $compl ){
      #    $complaintsInDec[$i] = $compl;
       #   $i = $i + 1;
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
        $complaints_no_desc = complaint::where('created_at', '>=', Carbon::now()->subMonth())->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
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
            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
            array('visit_on' => $request['day4'], 'department' => $complaints_no_desc[3]->department)
        ); 
        Schedule::insert($schedules);
       }

       //if size of  complaints_no_desc == 3
       elseif(sizeof($complaints_no_desc)==3){
        if(in_array('accomodation', $complaints_no_desc)==false){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    elseif(in_array('security', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'security')
                        ); 
                        Schedule::insert($schedules);
                    }
                    elseif(in_array('catering', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'catering')
                        ); 
                        Schedule::insert($schedules);                         
                    }
                    elseif(in_array('disability', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'disability')
                        ); 
                        Schedule::insert($schedules);
        
       }
    }
       //if size of  complaints_no_desc == 2
       elseif(sizeof($complaints_no_desc)==2){
        if(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'catering')
            ); 
            Schedule::insert($schedules);
        }

        elseif(in_array('disability', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    
        elseif(in_array('disability', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('catering', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
    }
            
       //if size of  complaints_no_desc == 1
       elseif(sizeof($complaints_no_desc)==1){
        if(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
         $schedules = array(
                 array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                 array('visit_on' => $request['day2'], 'department' => 'disability'),
                 array('visit_on' => $request['day3'], 'department' => 'catering'),
                 array('visit_on' => $request['day4'], 'department' => 'accomodation')
             ); 
             Schedule::insert($schedules);
     }
 
     elseif(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
         $schedules = array(
                 array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                 array('visit_on' => $request['day2'], 'department' => 'disability'),
                 array('visit_on' => $request['day3'], 'department' => 'catering'),
                 array('visit_on' => $request['day4'], 'department' => 'security')
             ); 
             Schedule::insert($schedules);
     }
     elseif(in_array('disability', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
         $schedules = array(
                 array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                 array('visit_on' => $request['day2'], 'department' => 'disability'),
                 array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                 array('visit_on' => $request['day4'], 'department' => 'security')
             ); 
             Schedule::insert($schedules);
     }
     elseif(in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
         $schedules = array(
                 array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                 array('visit_on' => $request['day2'], 'department' => 'catering'),
                 array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                 array('visit_on' => $request['day4'], 'department' => 'security')
             ); 
             Schedule::insert($schedules);
     }
 }
 
       //if size of  complaints_no_desc == 0
       else{
        $schedules = array(
            array('visit_on' => $request['day1'], 'department' => 'disability'),
            array('visit_on' => $request['day2'], 'department' => 'catering'),
            array('visit_on' => $request['day3'], 'department' => 'accomodation'),
            array('visit_on' => $request['day4'], 'department' => 'security')
        ); 
        Schedule::insert($schedules);
    }


      }
      //when there are entries from last month
      else{
        $complaints_no_desc = complaint::whereBetween(DB::raw('date(created_at)'), [$firstDayOfLastMonth, $lastDayOfLastMonth])->groupBy('department')->select('department', DB::raw('count(*) AS total'))->get();
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
            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
            array('visit_on' => $request['day4'], 'department' => $complaints_no_desc[3]->department)
        ); 
        Schedule::insert($schedules);
       }

       //if size of  complaints_no_desc == 3
       elseif(sizeof($complaints_no_desc)==3){
        if(in_array('accomodation', $complaints_no_desc)==false){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    elseif(in_array('security', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'security')
                        ); 
                        Schedule::insert($schedules);
                    }
                    elseif(in_array('catering', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'catering')
                        ); 
                        Schedule::insert($schedules);                         
                    }
                    elseif(in_array('disability', $complaints_no_desc)==false){
                        $schedules = array(
                            array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                            array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                            array('visit_on' => $request['day3'], 'department' => $complaints_no_desc[2]->department),
                            array('visit_on' => $request['day4'], 'department' => 'disability')
                        ); 
                        Schedule::insert($schedules);
        
       }
    }
       //if size of  complaints_no_desc == 2
       elseif(sizeof($complaints_no_desc)==2){
        if(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'catering')
            ); 
            Schedule::insert($schedules);
        }

        elseif(in_array('disability', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
                    
        elseif(in_array('disability', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'disability'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('catering', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
        elseif(in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
            $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => $complaints_no_desc[1]->department),
                array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
        }
    }
       //if size of  complaints_no_desc == 1
       elseif(sizeof($complaints_no_desc)==1){
       if(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false ){
        $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => 'disability'),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'accomodation')
            ); 
            Schedule::insert($schedules);
    }

    elseif(in_array('disability', $complaints_no_desc)==false && in_array('catering', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
        $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => 'disability'),
                array('visit_on' => $request['day3'], 'department' => 'catering'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('disability', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
        $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => 'disability'),
                array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
    elseif(in_array('catering', $complaints_no_desc)==false && in_array('accomodation', $complaints_no_desc)==false && in_array('security', $complaints_no_desc)==false ){
        $schedules = array(
                array('visit_on' => $request['day1'], 'department' => $complaints_no_desc[0]->department),
                array('visit_on' => $request['day2'], 'department' => 'catering'),
                array('visit_on' => $request['day3'], 'department' => 'accomodation'),
                array('visit_on' => $request['day4'], 'department' => 'security')
            ); 
            Schedule::insert($schedules);
    }
}
 
       //if size of  complaints_no_desc == 0
       else{
        $schedules = array(
            array('visit_on' => $request['day1'], 'department' => 'disability'),
            array('visit_on' => $request['day2'], 'department' => 'catering'),
            array('visit_on' => $request['day3'], 'department' => 'accomodation'),
            array('visit_on' => $request['day4'], 'department' => 'security')
        ); 
        Schedule::insert($schedules);
    }


        }
    
     

       

       
     
        
        return redirect('schedule');
    }
}



