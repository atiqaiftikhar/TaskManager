@extends('layouts.masterback')
@section('content')
@include('alert')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>User Table</h4>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Action</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>

                       <td><a class="btn btn-primary btn-sm"
                            href=""><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" href=""><i class="fa fa-trash"></i></a></td>
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
