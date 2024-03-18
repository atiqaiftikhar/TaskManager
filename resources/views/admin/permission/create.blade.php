@extends('layouts.masterback')
@section('content')
<div class="container">
    <form action=" {{ isset($permission) && $permission->id  ? route('permission.update', ['id' => $permission->id, 'cid' => $cid]) : route('permission.store', ['cid' => $cid]) }}"    method="post">
        @csrf
        <h1> {{$permission_category->name }} Permission</h1>
        <label class="fw-bold">Title</label>
        <input type="text" required class="form-control" name="title" value="{{isset($permission)? $permission->title :'' }}" placeholder="Title">
        <label class="fw-bold">Permission</label>
        <input type="text" required class="form-control" name="permission" value="{{isset($permission)? $permission->permission :'' }}" placeholder="Permission">






    <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
@endsection
