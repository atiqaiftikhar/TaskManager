<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    public function index()
    {
        $tasks = Task::with([ 'project', 'module'])->get();
        $projects = Project::all(); 
        $modules = Module::all(); 

        return view('navbar.taskview.taskviewindex', compact('tasks','projects','modules'));

    }
    public function show($id)
    {

        $tasks = Task::with(['creator', 'assignedUsers'])->find($id);

        if (!$tasks) {
            abort(404);
        }
        return view('navbar.taskview.taskviewshow', compact('tasks'));
    }
    
}
