<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use App\Notifications\UserAddedToTeamNotification;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
 }
    public function project()
    {
        $projects=Project::get();
        return view('admin.project.index',compact('projects'));

    }
    public function create ()
    {

        $projects= new Project();
        // $users = User::get();
        $teamMembers = User::get();

        return view('admin.project.projectcreate',compact('projects','teamMembers'));

    }

    public function store(Request $request)
    {
        $teamMemberIds = $request->input('team_members');




         $projects= new Project();

         $projects->name=$request->name;
         $projects->created_by  = auth()->user()->id;

         $projects->save();
        //  $projects->users()->attach($request->input('team_members'));

  // Attach team members
     $projects->users()->attach($teamMemberIds);

  // Retrieve team members for notification dispatching
    $teamMembers = User::find($teamMemberIds);

  // Dispatch notifications to team members
    foreach ($teamMembers as $member) {
      $member->notify(new UserAddedToTeamNotification($projects));
    }

         return redirect()->route('project.index')->with('success','Project Added Successfully');

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
