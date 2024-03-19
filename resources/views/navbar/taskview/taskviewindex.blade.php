@extends('layouts.masterfront')
@section('content')

<div class="container">
    <br><br>
    @foreach($projects as $project)
    <h2>{{ $project->name }}</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Task Title</th>
                <th>Description</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>@foreach($project->modules as $module)
            @if ($module && $module->tasks)
                @foreach($module->tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>{{ $task->status }}</td>
                        <td>{{ $task->task_created_by }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('task.edit', ['mid' => $module->id, 'id' => $task->id]) }}"><i class="fa fa-edit"></i>Edit</a>
                            <a class="btn btn-sm btn-danger"  href="{{ route('task.delet', ['mid' => $module->id, 'id' => $task->id]) }}"><i class="fa fa-trash"></i>Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach


            @endforeach
        </tbody>
    </table>
</div>
<br><br>
@endsection
