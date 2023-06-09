<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserRollController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function UserAll()
    {
        $user = DB::table('admins')->where('type', 2)->get();
        return view('admin.user_role.all_user', compact('user'));
    }

    public function UserCreate()
    {
        return view('admin.user_role.user_create');
    }

    public function UserStore(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:admins',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = new Admin();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->category = $request->category;
        $data->cupon = $request->cupon;
        $data->product = $request->product;
        $data->blog = $request->blog;
        $data->order = $request->order;
        $data->report = $request->report;
        $data->role = $request->role;
        $data->return = $request->return;
        $data->contact = $request->contact;
        $data->comment = $request->comment;
        $data->setiing = $request->setiing;
        $data->stock = $request->stock;
        $data->other = $request->other;
        $data->type = 2;
        $data->save();
        $notification = array(
            'message' => 'Successfully Admin Insert',
            'alert-type' => 'success'
        );
        return redirect()->route('user.all')->with($notification);
    }

    public function UserDelete($id)
    {
        $data = Admin::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Successfully Admin Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function UserEdit($id)
    {
        $user = Admin::find($id);
        return view('admin.user_role.update_user', compact('user'));
    }

    public function UserUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:admins',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $data = Admin::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->category = $request->category;
        $data->cupon = $request->cupon;
        $data->product = $request->product;
        $data->blog = $request->blog;
        $data->order = $request->order;
        $data->report = $request->report;
        $data->role = $request->role;
        $data->return = $request->return;
        $data->contact = $request->contact;
        $data->comment = $request->comment;
        $data->setiing = $request->setiing;
        $data->stock = $request->stock;
        $data->other = $request->other;
        $data->type = 2;
        $data->save();

        $notification = array(
            'message' => 'Successfully Admin Updated',
            'alert-type' => 'success'
        );
        return redirect()->route('user.all')->with($notification);
    }
}
