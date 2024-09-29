<?php

namespace App\Http\Controllers;

use App\Models\User; // Ensure the User model is correctly imported
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users from the database
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new User instance and save it to the database
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        // Redirect to the user index page with a success message
        return redirect()->route('manage.users')->with('success', 'User berhasil ditambahkan.');
    }
}