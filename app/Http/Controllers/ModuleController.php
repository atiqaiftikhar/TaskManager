<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
{
    public function module($tid)
{
// dd($tid);
    $task = Task::findOrFail($tid);


    $modules = Module::where('task_id', $tid)->get();


    return view('admin.module.index', compact('task','modules'));
}

public function create($tid)
{
    $modules= new Module();
    $task = Task::find($tid);
    $projectUsers = ProjectUser::where('project_id', $task->project_id)->pluck('user_id');
    $teamMembers = User::whereIn('id', $projectUsers)->get();
    return view('admin.module.create', compact('teamMembers','modules','task','tid'));
}




public function store(Request $request, $tid) {

    $validatedData = $request->validate([

        'name' => 'required|string|max:255',

    ]);


    $task = Task::findOrFail($tid);


    $modules = new Module();
    $modules->task_id = $task->id;

    $modules->module_created_by = Auth::id();
    $modules->name = $validatedData['name'];


    $modules->save();


    return redirect()->route('module.index', $tid)->with('success', 'Module created successfully.');
}
public function edit($tid, $id)
{

    $tasks = Task::findOrFail($tid);


    $modules = Module::findOrFail($id);
    $projectUsers = ProjectUser::where('project_id', $tasks->project_id)->pluck('user_id');


    $teamMembers = User::whereIn('id', $projectUsers)->get();
    return view('admin.module.create', compact('tasks', 'modules', 'tid','teamMembers'));
}


    public function update(Request $request,$tid, $id)
    {



        $modules = Module::findOrFail($id);

        $request->validate([

            'name' => 'required',

        ]);

        $modules->update([

            'name' => $request->input('name'),


        ]);






        return redirect()->route('module.index',['tid' => $tid])->with('success', 'Task Updated Successfully');
    }


    public function delete($tid, $id)
    {
        $modules=Module::find($id);


        $modules->delete();

        return redirect()->back()->with('success', 'Task Deleted Successfully');
    }

}
