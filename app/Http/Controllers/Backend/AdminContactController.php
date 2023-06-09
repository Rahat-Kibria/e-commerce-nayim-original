<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function AdminMessage(){
        $contact=Contact::all();
        return view('admin.contact.all_message',compact('contact'));
    }
}
