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
            <div class="form-group">
                <select name="role"  class="form-control " >
                    <option  selected  value="{{ null }}"> -- Select Role --</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endforeach
                </select>
            </div>

            


        {{-- @foreach($teamMembers as $member)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="team_members[]" value="{{ $member->id }}" id="member_{{ $member->id }}">
        <label class="form-check-label" for="member_{{ $member->id }}">
            {{ $member->name }}
        </label>
    </div>
@endforeach --}}


        <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
@endsection
