<?php

namespace App\Http\Controllers\UserBackend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function UserPassChange()
    {
        return view('profile.update-password-form');
    }

    public function UserPassUpdate(Request $request)
    {
        $validated = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashpassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashpassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'Successfully Update Password',
                'alert-type' => 'success'
            );

            return redirect()->route('login')->with($notification);
        } else {
            return redirect()->back();
        }
    }


    // user profile update

    public function UserUpdateProfile()
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        return view('profile.update_profile', compact('user'));
    }

    public function UserChangeProfile(Request $request)
    {
        $userid = Auth::user()->id;
        $data = User::find($userid);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('avater')) {
            $file = $request->file('avater');
            @unlink(public_path('upload/user_profile/' . $data->image));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_profile'), $fileName);
            $data['avater'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully Profile Updated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    /**
     * Stores user info in database.
     */
    public function user_create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        $notification = array(
            'message' => 'User registered successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
