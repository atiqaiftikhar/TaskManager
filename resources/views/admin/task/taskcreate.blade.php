@extends('layouts.masterback')
@section('content')
<div class="container">
    <form action="{{ $tasks->id != null ? route('task.update', ['id' => $tasks->id,'fid'=>$fid]):route('task.store', ['fid' => $fid]) }}" method="post">
        @csrf
        <h1>Task Form </h1>

        <label class="fw-bold">Task Title</label>
        <input type="text" required class="form-control" name="title" value="{{ $tasks->title  }}" placeholder="">

        <label class="fw-bold">Description</label>
        <textarea type="text" required class="form-control" name="description" value="{{ $tasks->description  }}" placeholder=""></textarea>

        <label class="fw-bold" for="due_date">Due Date</label>
       <input type="date"  name="due_date" class="form-control" value="{{ $tasks->due_date }}">


        <label class="fw-bold" for="team_member">Select Team Member</label>
        <select name="assign_to" required class="form-control">
         @foreach($teamMembers as $member)
        <option value="{{ $member->id }}">{{ $member->name }}</option>
        @endforeach
        </select>
        {{-- @foreach($teamMembers as $member)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="assign_to[]" value="{{ $member->id }}" id="member_{{ $member->id }}">
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
