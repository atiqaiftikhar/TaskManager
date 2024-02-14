@extends('layouts.masterfront')
@section('content')


<div class="container">
    <h1>Task Details for: TASK_NAME</h1>

    <p><strong>Description:</strong> TASK_DESCRIPTION</p>
    <p><strong>Due Date:</strong> TASK_DUE_DATE</p>
    <p><strong>Status:</strong> TASK_STATUS</p>
    <p><strong>Created By:</strong> CREATOR_NAME (CREATOR_EMAIL)</p>

    <h2>Assigned Users:</h2>
    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>USER_NAME (USER_EMAIL)</span>
            <span class="badge badge-info">Started: USER_STARTED_AT</span>
            <span class="badge badge-success">Finished: USER_FINISHED_AT</span>
        </li>
        </ul>
</div>
{{--
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-4">Task Details</h1>
            <h2 class="mb-3">TASK_NAME</h2>
            <p class="mb-2"><strong>Status:</strong> <span class="badge badge-pill badge-{{ task_status_color }}">{{ TASK_STATUS }}</span></p>
            <p class="mb-2"><strong>Due Date:</strong> {{ TASK_DUE_DATE }}</p>
            <p class="mb-3"><strong>Description:</strong></p>
            <p>{{ TASK_DESCRIPTION }}</p>
        </div>
        <div class="col-md-4">
            <h4 class="mb-3">Assigned Users</h4>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>USER_NAME (USER_EMAIL)</span>
                    <span class="badge badge-{{ user_status_color }}">{{ USER_STATUS }}</span>
                </li>
                </ul>
            <div class="text-right mt-4">
                <a href="#" class="btn btn-primary">Edit Task</a>
                <a href="#" class="btn btn-success">Mark Complete</a>
            </div>
        </div>
    </div>
</div> --}}

@endsection
