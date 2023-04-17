<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * ? Return Profile With Auth User
     * @return Application|Factory|View
     */
    public function index()
    {
        $user = User::query()->where('id', Auth::id())->first();

        return view('web.account.index', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::query()->findOrFail($id);

        $image_path = null;

        if( $request->hasFile('image') ) {
            $file = $request->file('image');

            $image_path = $file->store('/uploads', [
                'disk' => 'public'
            ]);
        }else{
            $image_path = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'image' => $image_path,
        ]);

        return redirect()->back();
    }
}
