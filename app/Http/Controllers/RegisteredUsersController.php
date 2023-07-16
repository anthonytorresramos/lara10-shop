<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RegisteredUsersController extends Controller
{
    public function index( Request $request){
        $users = User::paginate(10);
        return view('dashboard.tabs.registeredUsers.registeredUsers', compact('users'));
    }




    public function store(Request $request){

        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()->min(4)],

        ]);
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Set a flash message
        Session::flash('success', 'User created successfully!');

        // Redirect to the current page
        return redirect()->back();
    }

    public function edit(Request $request, $userId){
        $user = User::find($userId);
        return view('dashboard.tabs.registeredUsers.edit', compact('user'));
    }

    public function update(Request $request, $userId){


        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
        ]);

        if($request->input('password')) {
            $request->validate([
                'password' => [ 'confirmed', Password::defaults()->min(4)],
            ]);
        }

        $user = User::find($userId);

        $user->name = $request->fullname;


        if($request->input('password')) {
            $user->password = Hash::make($request->password);
        }


        $user->update();

        Session::flash('success', 'User updated successfully!');

        // Redirect to the current page
        return redirect()->back();
    }

    public function delete(Request $request, $userId){

        $user = User::findOrFail($userId);

        $user->delete();

        Session::flash('success', 'User deleted successfully!');

        return redirect()->back();
    }


}
