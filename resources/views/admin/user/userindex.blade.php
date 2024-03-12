@extends('layouts.masterback')
@section('content')
@include('alert')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h4>User Table</h4>
            <div class=" container text-end">
              <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm mb-2 text-end">Add User</a>
             </div>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7">id</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-uppercase text-primary text-xxs font-weight-bolder opacity-7 ps-2  ">Role</th>
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

                        <td><a class="btn btn-primary" href="{{ route('user.edit',['id'=>$user->id ]) }}"><i class="fa fa-edit"></i>Edit</a>
                          <a class="btn btn-danger" onclick="showDeleteModal({{ $user->id }})"  ref="{{ route('user.delete',['id'=>$user->id ]) }}"><i class="fa fa-trash"></i>Delete</a>

                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="deleteConfirmationModalLabel">Delete User</h5>
                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            
              </div>
              <div class="modal-body">
                  Are you sure you want to delete this user?
              </div>
              <div class="modal-footer">   
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

                  <a class="btn btn-primary" href="{{ route('user.delete',['id'=>$user->id ]) }}"><i class="fa fa-delete"></i>Delete</a>

                </div>
          </div>
      </div>
  </div>
    

  {{-- <script>
  
    function showDeleteModal(userId) {
        
        $('#deleteConfirmationModal').attr('data-user-id', userId);
        
        $('#deleteConfirmationModal').modal('show');
    }

    
    $('.close').click(function() {
        
        var userId = $('#deleteConfirmationModal').attr('data-user-id');
        
        window.location.href = '/user/delete/' + userId;
    });
    $('#cancelDeleteBtn').click(function() {
       
        $('#deleteConfirmationModal').modal('hide');
    });
</script> --}}

<script>
  function showDeleteModal(userId) {
      $('#deleteConfirmationModal').modal('show');
      $('#confirmDeleteBtn').attr('data-user-id', userId);
  }

  $('#confirmDeleteBtn').click(function() {
      var userId = $(this).attr('data-user-id');
      window.location.href = '/user/delete/' + userId;
  });

  $('#cancelDeleteBtn').click(function() {
      $('#deleteConfirmationModal').modal('hide');
  });
</script>

@endsection
