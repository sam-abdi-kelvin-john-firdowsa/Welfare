<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitorRegistryController extends Controller
{
    //
    public function index()
    {
        # code...
        return view ('pages.registryAdd');
    }
}
