<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectUser;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
public function __construct()
{
    $this->middleware('auth');
}
// function gettask($id){
//     return Project::find($id);

//  }
public function task($fid)
{

    $project=Project::find($fid);
    $tasks=Task::where('project_id',$fid)->get();
    return view('admin.task.taskindex',compact('tasks','project','fid'));


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

        $tasks=Task::find($id);
        $data=$request->all();
        // $tasks->users()->attach($request->input('team_members'));
        $tasks->update($data);
        return redirect()->route('task.index',)->with('success', 'Task Updated Successfully');
    }

    public function delete($id)
    {
        $tasks=Task::find($id);

        $tasks->delete();

        return redirect()->back()->with('success', 'Task Deleted Successfully');
    }




}
