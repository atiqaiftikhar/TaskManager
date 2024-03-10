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
                <a href="{{ route('module.create',$tid) }}" class="btn btn-success btn-sm mb-2 text-end">Add Module</a>

               </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Task Name</th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Module Name</th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Created by</th>



                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>
                     @foreach ($modules as $module)


            <td>{{ $module->id }}</td>
            <td>{{$module->task->name}}</td>
            <td>{{ $module->name }}</td>
            <td>{{ $module->module_created_by }}</td>


                    <a class="btn btn-primary btn-sm"
                     href="{{ route('module.edit', ['id' => $module->id,'tid'=>$tid]) }}"><i class="fa fa-edit"></i>Edit</a>

                    <a class="btn btn-danger btn-sm" href="{{ route('module.delete', ['id' => $module->id,'tid'=>$tid]) }}"><i class="fa fa-trash"></i>Delete</a>
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