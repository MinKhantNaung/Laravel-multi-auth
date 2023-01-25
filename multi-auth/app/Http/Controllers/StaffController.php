<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware('isStaff');
    }

    public function index () {
        return view('back.dashboard-2');
    }
}
