<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {


    //  if(Gate::allows('isAdmin'))
    //  {$Role=Role::get();
    //  return view('admin.role.index',compact('Role'));}
    //  else
    //  abort(403,"Invalid");
            return view('admin');

    }
}
