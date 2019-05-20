<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    //
    public function book()
    {
        return view('pages.bookAppointment');
    }

    public function appointments()
    {
        return view('pages.handleAppointments');
    }
}
