<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Visitor;

class VisitorRegistryController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }




    //
    public function index()
    {
        # code...
        $records = Visitor::orderBy('date', 'desc')->get();
        //return $records;
        return view ('pages.registryAdd')->with('records', $records);
    }

    public function registerVisitor(Request $request)
    {
        $this->validate(request(),[
            "date"=>"required",
            "name"=>"required",
            "role"=>"required",
            "mobile"=>"required",
            "purpose"=>"required",
            "officer"=>"required",
            "timeIn"=>"required",
            "timeOut"=>"required",
            "comments"=>"required",

        ]);

    

        $entry = new Visitor;

        $entry->date = $request['date'];
        $entry->name = $request['name'];
        $entry->role = $request['role'];
        $entry->mobileNo = $request['mobile'];
        $entry->regNo = $request['reg'];
        $entry->officerToSee = $request['officer'];
        $entry->reasonForVisit = $request['purpose'];
        $entry->timeIn = $request['timeIn'];
        $entry->timeOut = $request['timeOut'];
        $entry->remarks = $request['comments'];

            $entry->save();

            return redirect('/front_office');


    }
}
