@extends('layouts.masterback')
@section('content')
<div class="row">
    <div class="col-8">



<h2>{{ $task->title }}</h2>
<p>{{ $task->description}}</p>
    </div>
    <div class="col-4">
<div class=card>
    <div class="card-body">
        <h5>Project:</h5>{{$task->project->name}}
        <h5>Task:</h5>{{ $task->title }}
        {{-- <h5>Assign to:</h5>{{ $task->assign_to }} --}}
        <h5>Status:</h5>{{ $task->status }}
        <h5>Assign to:</h5>
        <p>{{ $task->assignee->name }}</p>
            <p>{{ $task->assignee->email }}</p>
        <h5>Created_by</h5>
        <p>{{ $task->createdBy->name }}</p>
         <p>{{ $task->createdBy->email }}</p>
        <h5>Due_Date:</h5>{{ $task->due_date }}

    </div>


</div>
    </div>

</div>
<div class="row">
    <div class="col-8">

    </div>
    <div class="col-4">
        <div class=card>
            <div class="card-body">
                <h3>Activities</h3>
                <ul>
                    @foreach ($activityLogs as $log)
                        <li>
                            <p><strong>{{ $log->activity }}</strong></p>
                            <p>{{ $log->created_at }}:</p>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>

    </div>

</div>

@endsection
