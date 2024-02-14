@extends('layouts.masterback')
@section('content')
@include('alert')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>Project Table</h4>
            <div class=" container text-end">
                <a href="{{ route('project.create') }}" class="btn btn-primary btn-sm mb-2 text-end">Add Project</a>
               </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Project Name</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Created By</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Tasks</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>

                    @foreach ($projects as $project)
        <tr>

            <td>{{ $project->id }}</td>
            <td>{{ $project->name }}</td>
            <td> {{ $project->created_by }}</td>

            <td> <a class="btn btn-dark btn-sm" href="{{ route('task.index', ['fid' => $project->id]) }}">Task</a></td>

           <td><a class="btn btn-primary btn-sm"
                href="{{ route('project.edit', ['id' => $project->id]) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ route('project.delete', ['id' => $project->id]) }}"><i class="fa fa-trash"></i></a></td>
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
