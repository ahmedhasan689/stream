<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LogoutOtherDeviceController extends Controller
{
    protected function authenticated(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
            ],
            [
                'password.required' => 'Password Required',
            ]
        );

        $user = auth()->user();

        if ( !Hash::check($request->input('password'),$user->password) ) {
            toastr()->error('Password Not Correct');

            return redirect()->back();
        }

        Auth::logoutOtherDevices($request->input('password'));

        toastr()->success('Successfully Logout');

        return redirect()->back();
    }
}
