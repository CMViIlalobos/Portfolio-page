<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function realEstate()
    {
        return view('demos.real-estate');
    }
}
