@extends('layouts.masterback')
@section('content')
<div class="container">
    <h1 class="text-center fw-bold">Add Permissions {{ $role->role_name }}</h1>
    <form method="post" action="{{ route('rolepermission.store', ['roleId' => $role->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Select Permissions:</label>
            @foreach ($permission_categories as $category)
                <h2>{{ $category->name }}</h2>
                <ul>
                    @foreach ($category->permissions as $permission)

                            {{-- <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                            <label>{{ $permission->title }}</label> --}}

                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                <label>{{ $permission->title }}</label>


                    @endforeach
                </ul>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Add Permissions</button>
    </form>
</div>
@endsection
