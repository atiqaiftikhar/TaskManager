<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
 }

    public function user()
    {
     $users=User::get();
     return view('admin.user.userindex',compact('users'));


    }
}
