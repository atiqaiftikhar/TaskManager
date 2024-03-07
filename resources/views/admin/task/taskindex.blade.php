@extends('layouts.masterback')
@section('content')
@include('alert')



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h3>Tasks</h3>
            <div class=" container text-end">
                <a href="{{ route('task.create',$fid) }}" class="btn btn-primary btn-sm mb-2 text-end">Add task</a>
               </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Project Name</th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  "></th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>
                     @foreach ($tasks as $task)


            <td>{{ $task->id }}</td>
            <td>{{$project->name}}</td>
            <td>{{ $task->title }}</td>

                <td><a class="btn btn-info btn-sm"
                    href="{{ route('task.detail', ['id' => $task->id,'fid'=>$fid]) }}"> Task Detail</a></td>

                 <td>
                    <a class="btn btn-primary btn-sm"
                     href="{{ route('task.edit', ['id' => $task->id,'fid'=>$fid]) }}"><i class="fa fa-edit"></i>Edit</a>

                    <a class="btn btn-danger btn-sm" href="{{ route('task.delete', ['id' => $task->id,'fid'=>$fid]) }}"><i class="fa fa-trash"></i>Delete</a>
                </td>
        </tr>
        @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>






{{--
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>Task Table</h4>
            <div class=" container text-end">
                <a href="{{ route('task.create',$fid) }}" class="btn btn-primary btn-sm mb-2 text-end">Add task</a>
               </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Project Name</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Assign to</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Due Date</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Status</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  "></th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>
                     @foreach ($tasks as $task)


            <td>{{ $task->id }}</td>
            <td>{{$project->name}}</td>
            <td>{{ $task->assign_to }}</td>
            <td>{{ $task->title }}</td>
            <td>{{ $task->description}}</td>
            <td>{{ $task->due_date }}</td>

            <td>{{ $task->status }}</td>
            {{-- <td><a class="btn btn-warning btn-sm">
                Ready for testing</a></td> <td>
                @if ($task->status === 'in_progress')
                <form method="POST" action="{{ route('task.readyForTesting', ['fid' => $fid, 'id' => $task->id]) }}">
                  @csrf
                  <button type="submit" class="btn btn-warning btn-sm">Ready for Testing</button>
                </form>
                @endif
                </td>
           <td><a class="btn btn-primary btn-sm"
                href="{{ route('task.edit', ['id' => $task->id,'fid'=>$fid]) }}"><i class="fa fa-edit"></i>Edit</a>
                    <a class="btn btn-danger btn-sm" href="{{ route('task.delete', ['id' => $task->id,'fid'=>$fid]) }}"><i class="fa fa-trash"></i>Delete</a></td>
        </tr>
        @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
@endsection