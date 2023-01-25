<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagerOrSupervisor');
    }

    public function index () {
        $users = User::all();

        return view('back.users.index', compact('users'));
    }

    public function edit ($id) {
        $user = User::find($id);
        $roles = Role::all();

        return view('back.users.edit', compact('user', 'roles'));
    }

    public function update (Request $request, $id) {
        $user = User::find($id);
        $roleIds = $request->role_ids;
        $user->roles()->sync($roleIds);

        return redirect('/admin/users');
    }
}
