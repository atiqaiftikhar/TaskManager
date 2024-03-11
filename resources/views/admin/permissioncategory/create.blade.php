@extends('layouts.masterback')
@section('content')
<div class="container">
    <form action="{{ $permission_category->id != null ? route('permissioncategory.update', ['id' => $permission_category->id]):route('permissioncategory.store') }}" method="post">
        @csrf
        <h1>Permission Category </h1>

        <label class="fw-bold">Category Name</label>
        <input type="text" required class="form-control" name="name" value="{{ $permission_category->name  }}" placeholder="">


        <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
@endsection
