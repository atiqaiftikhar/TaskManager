<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
// function gettask($id){
//     return Project::find($id);

//  }
// public function task($fid)
// {

//     $project=Project::find($fid);
//     $tasks=Task::where('project_id',$fid)->get();
//     return view('admin.task.taskindex',compact('tasks','project','fid'));


// }
public function task($fid)
{

    $project = Project::find($fid);


    $userId = Auth::id();


    $userRoleId = Auth::user()->role_id;


    if ($userRoleId == 2) {

        $tasks = Task::where('project_id', $fid)->get();
    } else {

        $tasks = Task::where('project_id', $fid)
                     ->where('assign_to', $userId)
                     ->get();
    }

    return view('admin.task.taskindex', compact('tasks', 'project', 'fid'));
}
public function create ($fid)
    {

        $tasks= new Task();

        $project=Project::find($fid);

    $projectUsers = ProjectUser::where('project_id', $fid)->pluck('user_id');
    $teamMembers = User::whereIn('id', $projectUsers)->get();
        // $teamMembers = User::get();

        return view('admin.task.taskcreate',compact('tasks','teamMembers','projectUsers','fid','project'));

    }
    public function store(Request $request,$fid)
    {
        // $teamMemberIds = $request->input('team_members');

        $project=Project::find($fid);




         $tasks = new Task();
         $tasks->assign_to = $request->input('assign_to');
         $tasks->project_id = $fid;
         $tasks->title = $request->input('title');
         $tasks->description = $request->input('description');
         $tasks->due_date = $request->input('due_date');
         $tasks->status = $request->input('status', 'assign');
        // return $tasks;
          $tasks->save();
        //   NotificationController::sendTaskNotification($tasks);
        Notification::create([
            'user_id' => auth()->user()->id,
            'task_id' => $tasks->id,
            'message' => 'You have been assigned a new task: ' . $tasks->title,
            'creation_date' => now(),
            'due_date' => $tasks->due_date,
            'is_read' => false // Initially set as unread
        ]);


         return redirect()->route('task.index',['fid'=>$fid])->with('success','Task Added Successfully');

    }
    public function edit($fid,$id)
    {

        $tasks=Task::find($id);
        $project=Project::find($fid);
        // $teamMembers = User::get();

      return view('admin.task.taskcreate',compact('tasks','project','fid'));

    }
    public function update(Request $request,$fid, $id)
    {

        $request->validate([
            'status' => 'required|in:in_progress,testing',
        ]);

        $tasks = Task::findOrFail($id);


        $tasks->update([
            'status' => $request->input('status')
        ]);
        return redirect()->route('task.index',['fid' => $fid])->with('success', 'Task Updated Successfully');
    }

    public function delete($id)
    {
        $tasks=Task::find($id);

        $tasks->delete();

        return redirect()->back()->with('success', 'Task Deleted Successfully');
    }

    public function readyForTesting(Request $request, $id)
{

    $task = Task::findOrFail($id);

    $project = $task->project;
    // return($project);

    if ($project && $project->creator) {

        $projectCreatorId = $project->creator->id;

    Notification::create([
        'user_id' => $projectCreatorId,
        'task_id' => $task->id,
        'message' => 'Task #' . $task->id . ' is ready for testing.',
        'creation_date' => now(),
        'due_date' => $task->due_date,

    ]);


    $task->status = 'Testing';
    $task->save();

    return redirect()->back()->with('success', 'Task is now ready for testing');
} else {

    return redirect()->back()->with('error', 'Failed to find project or project creator');
}

}

}
