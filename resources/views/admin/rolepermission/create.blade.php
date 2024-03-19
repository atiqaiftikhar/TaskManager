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

                    @php
                    $checked = ($role->role === 'admin') ? 'checked' : ($role->permissions->contains($permission->id) ? 'checked' : '');
                @endphp
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $checked }}>
                <label>{{ $permission->title }}</label>

                                {{-- <input type="checkbox"   name="permissions[]" value="{{ $permission->id }}"
                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>

                                <label>{{ $permission->title }}</label> --}}


                    @endforeach
                </ul>
            @endforeach
        </div>
        <button type="submit" class="btn btn-success">Add Permissions</button>
    </form>
</div>

{{-- <script>

    function handleCheckboxChange(checkbox) {

        const projectPermissions = ['Create Project', 'Edit Project', 'Delete Project', 'Update Project', 'Read Project'];
        const taskPermissions = ['Create Task', 'Edit Task', 'Delete Task', 'Update Task', 'Read Task'];
        const userPermissions = ['Create User', 'Edit User', 'Delete User', 'Update User', 'Read User'];


        let category;
        if (checkbox.name.startsWith('project')) {
            category = 'project';
        } else if (checkbox.name.startsWith('task')) {
            category = 'task';
        } else if (checkbox.name.startsWith('user')) {
            category = 'user';
        }

        let readPermission;
        if (category === 'project') {
            readPermission = 'Read Project';
        } else if (category === 'task') {
            readPermission = 'Read Task';
        } else if (category === 'user') {
            readPermission = 'Read User';
        }


        let readSelected = false;
        for (let permission of category === 'project' ? projectPermissions : category === 'task' ? taskPermissions : userPermissions) {
            if (permission !== readPermission && document.getElementById(`${category}_${permission}`).checked) {
                readSelected = true;
                break;
            }
        }


        if (readSelected) {
            document.getElementById(`${category}_${readPermission}`).checked = true;
            alert(`Automatically checked '${readPermission}' permission.`);
        }
    }


    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
          checkbox.addEventListener('change', () => {
    console.log('Checkbox changed');
    handleCheckboxChange(checkbox);
});

    });
</script> --}}

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
