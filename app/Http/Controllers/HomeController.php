<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

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
        return view('home');
       
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

   