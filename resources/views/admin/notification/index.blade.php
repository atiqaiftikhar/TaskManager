@extends('layouts.masterback')
@section('content')


            {{-- <div class="card">
                <div class="card-header">Notifications</div>
                <div class="card-body">
                    @foreach($notifications as $notification)
                        <div class="alert alert-info">
                            {{ $notification->message }}
                        </div>
                    @endforeach
                </div>
            </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @foreach($tasks as $task)

                <br>
    <div class="card">
         <div class="card-header"><h3>Task</h3></div>
        <div class="card-body">
            <li class="list-group-item">Project Name:<b>{{ $task->project->name }}</b></li>
            <li class="list-group-item">Task :{{ $task->title }}</li>
            <li class="list-group-item">Created_at:{{ $task->created_at }}</li>
            <li class="list-group-item">Due_date:{{ $task->due_date }}</li>
            <li class="list-group-item">Created_By:{{ $task->project->created_by}}</li>

             @if($task->status == 'assign')
             <form method="POST" action="{{ route('task.update', ['fid' => $task->project->id, 'id' => $task->id]) }}">

                 @csrf

                 <div class="form-group">
                     <label for="status">Update Status:</label>
                     <select name="status" id="status" class="form-control">
                         <option value="in_progress">In Progress</option>


                     </select>
                 </div>
                 <button type="submit" class="btn btn-primary">Update Status</button>
             </form>


             @endif


        </div>
    </div>

    @endforeach
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Assigned Tasks</div>
                <div class="card-body">

                    <div class="container">
                        <h4>Notifications</h4>
                        <ul>

                            @foreach ($notifications as $notification)
                                <li>

                                    {{-- <a href="{{ route('notifications.show', ['fid' => $fid, 'id' => $notification->task_id]) }}"> --}}
                                        <a href="{{ route('notifications.show',['fid' => $fid, 'id' => $notification->task_id]) }}">
                                        {{ $notification->message }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








@endsection
