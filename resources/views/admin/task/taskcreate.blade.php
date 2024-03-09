@extends('layouts.masterback')
@section('content')

<div class="container">
    @if(Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Failed!</strong> {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        @php
        Session::forget('error');
        @endphp
    </div>
    @endif
    <form action="{{ isset($tasks) && $tasks->id  ? route('task.update', ['id' => $tasks->id, 'fid' => $fid]) : route('task.store', ['fid' => $fid]) }}" method="post">

        @csrf

        <h1>Task Form </h1>

        <label class="fw-bold">Task Title</label>
        <input type="text" required class="form-control" name="title" value="{{ $tasks->title ?? '' }}" placeholder="">

        <label class="fw-bold">Description</label>
        {{-- <textarea type="text" required class="form-control" name="description" value="{{ $tasks->description ?? '' }}" placeholder=""></textarea> --}}
        <textarea required class="form-control" name="description" placeholder="">{{ $tasks->description ?? '' }}</textarea>

        <label class="fw-bold" for="due_date">Due Date</label>
       <input type="date"  name="due_date" class="form-control" value="{{ $tasks->due_date ?? '' }}">


        <label class="fw-bold" for="team_member">Select Team Member</label>
        <select name="assign_to" required class="form-control">
         @foreach($teamMembers as $member)
        <option value="{{ $member->id }} {{ isset($tasks) && $tasks->assign_to == $member->id ? 'selected' : '' }}">{{ $member->name }}</option>
        @endforeach
        </select>





<label for="status">Task Status:</label>

                     {{-- <select name="status" id="status" class="form-control">

                        @foreach ($status as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select> --}}
                    <select name="status" class="form-control">
                        @foreach ($dynamicOptions['status'] as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    <label for="type">Type:</label>
{{-- <select name="type" id="type" class="form-control"> --}}

    {{-- @foreach ($types as $type)
        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
    @endforeach
</select> --}}
<select name="type" id="type" class="form-control">
    @foreach ($dynamicOptions['types'] as $type)
        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
    @endforeach
</select>

<label for="priority">Priority: </label>
{{-- <select class="form-control" name="priority" id="priority"> --}}

    {{-- @foreach ($priorities as $priority)
        <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
    @endforeach --}}
    <select name="priority" id="priority" class="form-control">
        @foreach ($dynamicOptions['priorities'] as $priority)
            <option value="{{ $priority }}">{{ ucfirst($priority) }}</option>
        @endforeach
    </select>
</select>

        <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
            style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
    </form>
</div>
</div>
@endsection
