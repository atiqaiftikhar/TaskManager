@extends('layouts.masterback')
@section('content')
@include('alert')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>Permission Category Table</h4>
            <div class=" container text-end">
                <a href="{{ route('permissioncategory.create') }}" class="btn btn-primary btn-sm mb-2 text-end">Add category</a>
               </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Category Name</th>

                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                  <tr>

                    @foreach ($permission_category as $permission_category)
        <tr>

            <td>{{ $permission_category->id }}</td>
            <td>{{ $permission_category->name }}</td>


            <td> <a class="btn btn-dark btn-sm" href="{{ route('permission.index', ['cid' => $permission_category->id]) }}">Permissions</a></td>
            {{-- <td></td> --}}

           <td><a class="btn btn-primary btn-sm"
                href="{{ route('permissioncategory.edit', ['id' => $permission_category->id]) }}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm" href="{{ route('permissioncategory.delete', ['id' => $permission_category->id]) }}"><i class="fa fa-trash"></i></a></td>
        </tr>
        @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
