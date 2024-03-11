@extends('layouts.masterback')
@section('content')
<div class="container">
    <h1 class="text-center fw-bold">Permission</h1>

   <div class="text-end">
    <a href="{{ route('permission.create',$cid) }}" class="btn btn-success btn-sm mb-2 text-end">Add Permisson</a>
   </div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>permission</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($permission as $per)
        <tr>

            <td>{{ $per->id }}</td>
            <td>{{ $per->title }}</td>
            <td>{{ $per->permission }}</td>

           <td><a class="btn btn-primary btn-sm"
                href="{{ route('permission.edit', ['id' => $per->id]) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ route('permission.delete', ['id' => $per->id]) }}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
