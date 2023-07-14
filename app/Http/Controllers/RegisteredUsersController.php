<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisteredUsersController extends Controller
{
    public function index(){
        $users = User::paginate(10);
        return view('registeredUsers', compact('users'));



    }
}
