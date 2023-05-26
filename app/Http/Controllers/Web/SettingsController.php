<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        if( $request->ajax() ) {
            return view('web.setting.form_data', compact('user'))->render();
        }

        return view('web.setting.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'email' => 'sometimes',
            'password' => 'sometimes',
        ]);

        if( $request->email ) {
            $user->update([
               'email' => $request->email,
            ]);
        }

        if( $request->password ) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if( $request->date ) {
            $user->update([
                'date_of_birth' => $request->date,
            ]);
        }

        if( $request->avatar ) {
            $image_path = null;

            if( $request->hasFile('avatar') ) {
                $file = $request->file('avatar');

                $image_path = $file->store('/uploads', [
                    'disk' => 'public'
                ]);

                $user->update([
                    'image' => $image_path,
                ]);

                return redirect()->back();
            }else{
                $image_path = $user->image;
            }


        }else{
            return redirect()->back();
        }

    }
}
