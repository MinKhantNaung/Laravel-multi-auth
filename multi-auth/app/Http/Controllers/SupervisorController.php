<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagerOrSupervisor');
    }
    public function index () {

        return view('back.dashboard-1');
    }
}
