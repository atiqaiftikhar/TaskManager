@extends('layouts.masterback')
@section('content')
<div class="row">
    <div class="col-8">
<h3>Task</h3>
<h1>Task Details</h1>
<p>Task ID: {{ $task->id }}</p>
<p>Title: {{ $task->title }}</p>
    </div>
    <div class="col-4">

    </div>

</div>

@endsection
