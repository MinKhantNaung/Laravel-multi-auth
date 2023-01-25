<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagerOrSupervisor');
    }

    public function index () {
        $roles = Role::all();

        return view('back.users.role', compact('roles'));
    }
}
