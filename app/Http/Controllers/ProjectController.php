<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Notifications\UserAddedToTeamNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
 }
    // public function project()
    // {
    //     $projects=Project::get();
    //     return view('admin.project.index',compact('projects'));

    // }
    public function project()
{

    $userId = Auth::id();


    $userRoleId = Auth::user()->role_id;


    if ($userRoleId == 2) {

        $projects = Project::all();
    } else {

        $projects = Project::whereHas('tasks', function ($query) use ($userId) {
            $query->where('assign_to', $userId);
        })->get();
    }

    return view('admin.project.index', compact('projects'));
}
    public function create ()
    {

        $projects= new Project();
        // $users = User::get();
        $teamMembers = User::get();

        return view('admin.project.projectcreate',compact('projects','teamMembers'));

    }

//     public function store(Request $request)
//     {
//         $teamMemberIds = $request->input('team_members');




//          $projects= new Project();

//          $projects->name=$request->name;
//          $projects->created_by  = auth()->user()->id;

//          $projects->save();
//         //  $projects->users()->attach($request->input('team_members'));

//   // Attach team members
//      $projects->users()->attach($teamMemberIds);

//   // Retrieve team members for notification dispatching
//     $teamMembers = User::find($teamMemberIds);

// //   Dispatch notifications to team members
//     foreach ($teamMembers as $member) {
//       $member->notify(new UserAddedToTeamNotification($projects));
//     }

//          return redirect()->route('project.index')->with('success','Project Added Successfully');

//     }


public function store(Request $request)
{
    $teamMemberIds = $request->input('team_members');

    $project = new Project();
    $project->name = $request->name;
    $project->created_by = auth()->user()->id;
    $project->save();

    // Attach team members to the project
    $project->users()->attach($teamMemberIds);

    return redirect()->route('project.index')->with('success', 'Project Added Successfully');
}
    public function edit($id)
    {

        $projects=Project::find($id);
        $teamMembers = User::get();

      return view('admin.project.projectcreate',compact('projects','teamMembers'));

    }
    public function update(Request $request,$id)
    {

        $projects=Project::find($id);
        $data=$request->all();
        //  $projects->users()->attach($request->input('team_members'));
         $selectedTeamMembers = $request->input('team_members', []);
         $projects->users()->detach();
         $projects->users()->attach($selectedTeamMembers);
         $projects->update($data);
        return redirect()->route('project.index')->with('success', 'Project Updated Successfully');
    }

    public function delete($id)
    {
        $projects=Project::find($id);

        $projects->delete();

        return redirect()->back()->with('success', 'Project Deleted Successfully');
    }
}
