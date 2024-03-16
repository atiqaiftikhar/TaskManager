<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Notifications\UserAddedToTeamNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
 }
    // public function project()
    // {
    //     if (Gate::denies('read-project')) {
    //         abort(403, 'Unauthorized action.');
    //     }
    //     $projects=Project::get();
    //     return view('admin.project.index',compact('projects'));

    // }
//     public function project()
// {

//     $userId = Auth::id();


//     $userRoleId = Auth::user()->role_id;


//     if ($userRoleId == 2) {

//         $projects = Project::all();
//     } else {

//         $projects = Project::whereHas('tasks', function ($query) use ($userId) {
//             $query->where('assign_to', $userId);
//         })->get();
//     }

//     return view('admin.project.index', compact('projects'));
// }
public function project()
{

    // if (Gate::denies('read-project')) {
    //     abort(403, 'Unauthorized action.');
    // }

    if (Gate::denies('has-permission', 'project.index')) {
        abort(403, 'Unauthorized action.');
    }
    $userId = Auth::id();
    $userRoleId = Auth::user()->role_id;


    if ($userRoleId == 1) {
        $projects = Project::all();
    } elseif ($userRoleId == 2) {

        $projects = Project::where('created_by', $userId)
            ->orWhereHas('tasks', function ($query) use ($userId) {
                $query->where('assign_to', $userId);
            })->get();
    } else {

        $projects = Project::whereHas('tasks', function ($query) use ($userId) {
            $query->where('assign_to', $userId);
        })->get();
    }

    return view('admin.project.index', compact('projects'));
}
    public function create ()
    {
        // if (Gate::denies('create-project')) {
        //     abort(403, 'Unauthorized action.');
        // }
        if (Gate::denies('has-permission', 'project.create')) {
            abort(403, 'Unauthorized action.');
        }
        $projects= new Project();

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
        // if (Gate::denies('edit-project', $projects)) {
        //     abort(403, 'Unauthorized action.');
        // }
        if (Gate::denies('has-permission', 'project.edit')) {
            abort(403, 'Unauthorized action.');
        }
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
        // if (Gate::denies('delete-project', $projects)) {
        //     abort(403, 'Unauthorized action.');
        // }
        if (Gate::denies('has-permission', 'project.delete')) {
            abort(403, 'Unauthorized action.');
        }
        $projects->delete();

        return redirect()->back()->with('success', 'Project Deleted Successfully');
    }
}
