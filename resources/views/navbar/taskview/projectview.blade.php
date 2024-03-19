@extends('layouts.masterfront')
@section('content')
<div class="container">
    <br>
    <h3>Projects</h3>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Project</th>
                <th>Created By</th>
                <th>Module</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
            <tr>

             <td>{{ $project->id }}</td>
             <td>{{ $project->name }}</td>
             <td> {{ $project->creator->name }}</td>
             <td><a class="btn btn-dark btn-sm" href="">Module</a></td>
            </tr>
            @endforeach
        </tbody>
        </table>

</div>
@endsection
