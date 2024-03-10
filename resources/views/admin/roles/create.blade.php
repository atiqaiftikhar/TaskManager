@extends('layouts.masterback')
@section('content')

<div class="container-fluid">
    <div class="content-wrapper">
    
        <br><br>
        <div class="container">
     <form action="{{ $roles->id !=null ? route('roles.update',['id'=>$roles->id]): route('roles.store') }}" method="post" enctype="multipart/form-data">
               
                @csrf
            
                <input class="form-control" type="text" placeholder="Add Roles" value="{{ isset( $roles)? $roles->role: '' }}" name="role">
        
        <br>
          {{-- @if ($countryfield)
        @foreach ($countryfield as $countryField)
                <input  class="form-control" type="{{ $countryField->field_type }}"  placeholder="{{ $countryField->field_placeholder }}"  name="{{ $countryField->field_name }}" value="{{ old($countryField->field_name, $country->{$countryField->field_name} ?? '') }}">
          
        @endforeach
        @endif --}}
        
        
        
        <input class="btn btn-danger" type="submit" value="Save">
        
            </form>
        </div>
        

</div>
</div>
@endsection