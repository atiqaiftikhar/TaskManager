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
                <a href="{{ route('task.create',$fid) }}" class="btn btn-success btn-sm mb-2 text-end">Add Task</a>
                <?php
                //dd($fid);
                ?>
               </div>
          </div>
          <div class="card-body">
            <form action="{{ route('task.index', ['fid' => $fid]) }}" method="GET">
                <div class="row">
                    <div class="col-md-2">

                        <select name="task_created_by" class="form-control">
                            <option value="">Select Created By</option>
                            @foreach ($teamMembers as $member)
                                <option value="{{ $member->id }}" {{ ($member->id == old('task_created_by')) ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="priority" class="form-control">
                            <option value="">Select Priority</option>
                            @foreach ($dynamicOptions['priorities'] as $priority)
                                <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-control">
                            <option value="">Select Status</option>
                            @foreach ($dynamicOptions['status'] as $status)
                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="assign_to" class="form-control">
                            <option value="">Select Assignee</option>
                            @foreach ($teamMembers as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
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
            <td>{{$task->project->name}}</td>
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






@endsection
