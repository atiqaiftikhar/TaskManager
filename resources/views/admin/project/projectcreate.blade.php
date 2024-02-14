@extends('layouts.masterback')
@section('content')
<div class="container">
    <form action="{{ $projects->id != null ? route('project.update', ['id' => $projects->id]):route('project.store') }}" method="post">
        @csrf
        <h1>Project Form </h1>

        <label class="fw-bold">Project Name</label>
        <input type="text" required class="form-control" name="name" value="{{ $projects->name  }}" placeholder="">
        {{-- <div class="form-group">
            <label for="team_members">Select Team Members:</label>
            <select name="team_members[]" id="team_members" class="form-control" multiple>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div> --}}

        <label for="team_members">Team Members:</label>
        {{-- <select class="form-control" id="team_members" name="team_members[]" multiple required>
            @foreach($teamMembers as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select> --}}
        @foreach($teamMembers as $member)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="team_members[]" value="{{ $member->id }}" id="member_{{ $member->id }}">
        <label class="form-check-label" for="member_{{ $member->id }}">
            {{ $member->name }}
        </label>
    </div>
@endforeach
    </div>

        <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
@endsection
