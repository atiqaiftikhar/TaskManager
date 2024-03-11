@extends('layouts.masterback')
@section('content')
<form action="{{ isset($modules) && $modules->id  ? route('module.update', ['id' => $modules->id, 'tid' => $tid]) : route('module.store', ['tid' => $tid]) }}" method="post">

    @csrf

    <h1>Module Form </h1>

    <label class="fw-bold">Module Title</label>
    <input type="text" required class="form-control" name="name" value="{{ $modules->name ?? '' }}" placeholder="">



    <label class="fw-bold" for="team_member">Select Team Member</label>
    <select name="module_assign_to" required class="form-control">
     @foreach($teamMembers as $member)
    <option value="{{ $member->id }} {{ isset($modules) && $modules->modules_assign_to == $member->id ? 'selected' : '' }}">{{ $member->name }}</option>
    @endforeach
    </select>










    <button class="btn btn-success mt-4 float-end mb-4" type="submit"><i class="fa fa-check-circle"
        style="font-size:25px; color: rgb(43, 255, 43);"></i> <span>SAVE</span></button>
</form>
</div>
</div>
@endsection
