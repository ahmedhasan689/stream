<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
        [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-7])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'gender' => ['required'],
            'date_of_birth' => ['required'],
        ],
        [
            'name.required' => 'Please enter your name.',
            'name.string' => 'Your name must be a string.',
            'name.max' => 'Your name cannot be longer than :max characters.',
            'email.required' => 'Please enter your email address.',
            'email.string' => 'Your email address must be a string.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Your email address cannot be longer than :max characters.',
            'email.unique' => 'This email address is already in use.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Your passwords do not match.',
            'password.regex' => 'The password must contain letters, numbers, and symbols.',
            'gender.required' => 'Please select your gender.',
            'date_of_birth.required' => 'Please enter your date of birth.',
        ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'image' => 'uploads/avatar.png'
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
