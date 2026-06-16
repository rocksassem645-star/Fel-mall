<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view("User", ['result' => $users]);
    }

    public function show($id)
    {
        $users = User::findOrFail($id);

        return view("User.show", ["result" => $users]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'   => ['required', 'max:255'],
            'email'  => ['required', 'email', 'max:255'],
            'role'   => ['required'],
            'status' => ['required'],
        ]);

        $user = User::findOrFail($request->old_id);

        $data = [
            'name'   => $request->name,
            'email'  => $request->email,
            'role'   => $request->role,
            'status' => $request->status,
        ];

        // Only update password if provided
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('home')->with('user_message', 'Update successful');
    }

    public function edit($id)
    {

        $users = User::findOrFail($id);

        return view("User.edit", ["result" => $users]);
    }

    public function delete($id)
    {

        $users = User::findOrFail($id);
        $users->delete();

        return redirect()->route("home")->with("user_message", "Delete successful");
    }

    public function create()
    {
        return view("User.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'unique:users', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
            'role' => ['required'],
            'status' => ['required'],
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => bcrypt($request->password),
            "role" => $request->role,
            "status" => $request->status,
        ]);

        return redirect()->route("home")->with("user_message", "Creation successful");
    }
}
