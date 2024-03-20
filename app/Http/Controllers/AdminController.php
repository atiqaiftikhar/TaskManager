<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // public function index()
    // {


    // //  if(Gate::allows('isAdmin'))
    // //  {$Role=Role::get();
    // //  return view('admin.role.index',compact('Role'));}
    // //  else
    // //  abort(403,"Invalid");

    //         return view('admin');

    // }
    public function index()
{


    $user = Auth::user();
    if($user->role == 'Admin' || $user->role == 'Task Manager' ||$user->role == 'Team Member' ||$user->role == 'User' ){
        return view('admin');
            }
            else{
               return abort(401);
            }
}
}
