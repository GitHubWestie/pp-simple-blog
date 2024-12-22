<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'login-email' => 'email|min:3|max:255|required',
            'login-password' => 'string|min:8|max:128|required',
        ]);

        // Find user in DB using validated data
        $user = Users::where('email', '=', $validatedData['login-email'])->first();

        // Check if user not found
        if(!$user) {
            return redirect()->back()->withErrors([
                'login-email' => 'Email and/or password incorrect',
                ])->withInput();
        }

        // Check if password in validated data does not match DB
        if($user['password'] !== $validatedData['login-password']) {
            return redirect()->back()->withErrors([
                'login-email' => 'Email and/or password incorrect',
                ])->withInput();
        }

        // Check if user exists and validated password matches password in DB
        if($user && $user['password'] === $validatedData['login-password']) {
            return 'User match. Welcome to your homepage';
        }
    }

    /**
     * Validates data from register form request object
     * then creates a new instance of the user model class,
     * using the santised data array and saves user to DB
    */
    public function create(Request $request)
    {
        // Validates register form data
        $validatedData = $request->validate([
            'register-email' => 'required|email|min:3|max:255|unique:users,email', // No space after comma or it wont work!
            'password' => 'required|string|min:8|max:128',
            'confirm-password' => 'required|same:password',
        ]);

            // Creates new user and saves to DB
            $user = new Users();
            $user->email = $validatedData['register-email'];
            $user->password = $validatedData['password'];
            $user->save();

        return "User should now be stored in the database";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        //
    }
}
