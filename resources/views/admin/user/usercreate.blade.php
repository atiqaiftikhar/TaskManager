@extends('layouts.masterback')
@section('content')
<div class="container">
    <form action="{{ $users->id != null ? route('user.update', ['id' => $users->id]):route('user.store') }}" method="post">
        @csrf

        <div class="mb-3 mt-3">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name"  name="name" value="{{ $users->name }}"  required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email"  name="email" value="{{ $users->email }}"  required>
        </div>
        <div class="mb-3 mt-3">
            <label for="name">Password:</label>
            <input type="password" class="form-control" id="password" value="{{ $users->password }}"   name="password" required>
        </div>

        <div class="mb-3 mt-3">
            <div class="form-group">
                <label for="role_id">Role:</label>
                <select name="role" id="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->role }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>





        <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
@endsection
