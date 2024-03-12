@extends('layouts.masterback')
@section('content')

<div class="container-fluid">
    <div class="content-wrapper">


    <h1 class="text-center fw-bold">Roles</h1>
    <div class="text-end mb-4">
        <div>
            <a class="btn btn-success " href="{{ route('roles.create') }}">Add Role</a>
        </div></div> 

<table class="table table-stripped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>Action</th>

            
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->role }}</td>
            <td><a class="btn btn-primary" href="{{ route('roles.edit',['id'=>$role->id ]) }}"><i class="fa fa-edit"></i>Edit</a>
                <a class="btn btn-danger" href="{{ route('roles.delete',['id'=>$role->id ]) }}" ><i class="fa fa-trash"></i>Delete</a></td>
            
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

@endsection