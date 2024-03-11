@extends('layouts.masterback')
@section('content')
@include('alert')
<div class="container">
    <h1 class="text-center fw-bold">Role Permissions</h1>
    {{-- @include('alert') --}}

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Role</th>
            <th>Permission</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->role }}</td>

           <td><a class="btn btn-primary btn-sm"
                href="{{ route('rolepermission.add', ['roleId' => $role->id]) }}">Add Permission</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
