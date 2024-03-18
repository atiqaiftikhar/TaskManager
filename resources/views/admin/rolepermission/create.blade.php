@extends('layouts.masterback')
@section('content')
<div class="container">
    <h1 class="text-center fw-bold">Add Permissions For {{ $role->role }}</h1>
    <form method="post" action="{{ route('rolepermission.store', ['roleId' => $role->id]) }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Select Permissions:</label>
            @foreach ($permission_categories as $category)
                <h2>{{ $category->name }}</h2>
                <ul>
                    @foreach ($category->permissions as $permission)



                                <input type="checkbox"  class="permissionCheckbox" name="permissions[]" value="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                <label>{{ $permission->title }}</label>


                    @endforeach
                </ul>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Add Permissions</button>
    </form>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.permissionCheckbox').change(function() {
        console.log("Checkbox changed");
        var selectedPermission = $(this).val();
        console.log("Selected permission:", selectedPermission);
        var dependentPermissions = getPermissionDependencies(selectedPermission);
        console.log("Dependent permissions:", dependentPermissions);

        // Check if any dependent permissions are not selected
        dependentPermissions.forEach(function(dependency) {
            console.log("Checking dependency:", dependency);
            if ($('.permissionCheckbox[value="' + dependency + '"]').prop('checked') === false) {
                console.log("Dependency not selected, auto-selecting:", dependency);
                // Automatically check the dependent permission
                $('.permissionCheckbox[value="' + dependency + '"]').prop('checked', true);
            }
        });
    });

    function getPermissionDependencies(permissionTitle) {
    var dependencies = [];

    // Define category-specific permissions
    var categoryPermissions = {
        'project': ['Create Project', 'Edit Project', 'Delete Project', 'Update Project', 'Read Project'],
        'task': ['Create Task', 'Edit Task', 'Delete Task', 'Update Task', 'Read Task'],
        'module': ['Create Module', 'Edit Module', 'Delete Module', 'Update Module', 'Read Module'],
        'user': ['Create User', 'Edit User', 'Delete User', 'Update User', 'Read User']
        // Add more categories and their permissions as needed
    };

    // Check if the selected permission belongs to any category
    Object.entries(categoryPermissions).forEach(([category, permissions]) => {
        if (permissions.includes(permissionTitle)) {
            // If any permission related to a category (e.g., project, task, module, user) is selected,
            // automatically select the corresponding 'Read' permission for that category
            dependencies.push(category + '.Read');
        }
    });

    // Add more dependency logic as needed for other permissions

    return dependencies;
}
});
</script> --}}
@endsection
