@extends('layouts.masterfront')
@section('content')
<img src="{{asset('assets/img/featuress.png')}}" width="100%" height="100%">
<div class="container " style="margin-top: 30px;">



    <h2 >
        Made for You. Made for Your Team
    </h2>
    <h1>
        TaskEase Features.
    </h1>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-3">
            <a href="#" class="btn btn-lg btn-light btn-outline-dark rounded-pill"> Project Management</a>

        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-lg btn-light btn-outline-dark rounded-pill">Task Management</a>

        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-lg btn-light btn-outline-dark rounded-pill">Teams</a>

        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-lg btn-light btn-outline-dark rounded-pill">Communication</a>

        </div>
      </div>
    </div>



<div style="margin-top: 50px;">


    <div class="row" style="margin-top: 30px;" >
        <div class="col-4">
            <div class="card rounded bg-secondary ">
                <div class="card-body">
                    <img height="100%" width="100%" src="assets/img/fcard.png">

                 </div>
             </div>
             <h4>
                Assignees & Watchers
             </h4>
             <p>Incoming. Assign tasks to the responsible person and stay in the loop as a task watcher – coordination made easy!

             </p>
        </div>


        <div class="col-4">
            <div class="card rounded bg-secondary ">
                <div class="card-body">
                    <img height="150" width="100%" src="assets/img/fcard2.png">

                 </div>
             </div>

             <h4>
                Due Dates
             </h4>
             <p>Right on time. Set due dates to keep your team informed about what’s needed, when. See overdue tasks from the project board!

             </p>
        </div>


        <div class="col-4">
            <div class="card rounded bg-secondary ">
                <div class="card-body">
                    <img height="150" width="100%" src="assets/img/fcard4.png">

                 </div>
             </div>
             <h4>
                Time Tracking
             </h4>
             <p>Right on track. Keep a record of time spent on a task with our built-in tracker. Perfect for monitoring team performance.
             </p>
        </div>

</div>


{{-- row 2 --}}

<div class="row" style="margin-top: 30px;" >
    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/fcard5.png">

             </div>
         </div>
         <h4>
            Task Relationships
         </h4>
         <p>Connected. Keep your team informed about how tasks fit together by linking them as related, duplicate, or blocking.

         </p>
    </div>


    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/fcard9.png">

             </div>
         </div>

         <h4>
            Subtasks
         </h4>
         <p>
            Drill down. Break down big tasks into bite-sized steps for an extra layer (or two!) on even the biggest projects. Every subtask has its own assignee and due date.

         </p>
    </div>


    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/fcard7.png">

             </div>
         </div>
         <h4>
            Custom Fields
         </h4>
         <p>As standard. Improve task descriptions with custom fields: perfect for task information that your team regularly needs.
         </p>
    </div>

</div>

</div>
{{-- project  --}}
<div style="margin-top: 50px;">
    <h1>
        Project Management Features.
    </h1>

<div class="row" style="margin-top: 30px;" >
    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/pcard1.png">

             </div>
         </div>
         <h4>
            Reports
         </h4>
         <p>Data-driven. Get the insights that matter: Generate quick reports, or customize filters for a clear overview of project status.

         </p>
    </div>


    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/pcard2.png">

             </div>
         </div>
         <h4>
            Filters
         </h4>
         <p>Streamlined. Filter project tasks by assignee, tag, watcher, due date, status, or schedule for maximum clarity.

         </p>
    </div>


    <div class="col-4">
        <div class="card rounded bg-secondary ">
            <div class="card-body">
                <img height="160" width="100%" src="assets/img/pcard3.png">

             </div>
         </div>
         <h4>
            Unlimited Sections
         </h4>
         <p>Optimized. Create, name and arrange project sections to match your workflow precisely. Collapse sections for a focused overview.

         </p>
    </div>




</div>



</div>






</div>

@endsection
