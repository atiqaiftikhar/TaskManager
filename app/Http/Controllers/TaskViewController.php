<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    public function index()
    {
        return view('navbar.taskview.taskviewindex');
    }
}
