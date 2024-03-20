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
                            {{-- @php
                    $checked = ($role->role === 'admin') ? 'checked' : ($role->permissions->contains($permission->id) ? 'checked' : '');
                @endphp
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ $checked }}>
                <label>{{ $permission->title }}</label> --}}

                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                                isDepend="{{ $permission->depend }}" category="{{ $category->id }}"
                                userClicked=false
                                {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>

                            <label>{{ $permission->title }}</label>
                        @endforeach
                    </ul>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Add Permissions</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // function handleCheckboxChange(checkbox) {

        //     const projectPermissions = ['Create Project', 'Edit Project', 'Delete Project', 'Update Project',
        //         'Read Project'
        //     ];
        //     const taskPermissions = ['Create Task', 'Edit Task', 'Delete Task', 'Update Task', 'Read Task'];
        //     const modulePermissions = ['Create Module', 'Edit Module', 'Delete Module', 'Update Module', 'Read Module'];
        //     const userPermissions = ['Create User', 'Edit User', 'Delete User', 'Update User', 'Read User'];


        //     let category;
        //     if (checkbox.name.startsWith('project')) {
        //         category = 'project';
        //     } else if (checkbox.name.startsWith('task')) {
        //         category = 'task';
        //     } else if (checkbox.name.startsWith('user')) {
        //         category = 'user';
        //     }

        //     let readPermission;
        //     if (category === 'project') {
        //         readPermission = 'Read Project';
        //     } else if (category === 'task') {
        //         readPermission = 'Read Task';
        //     } else if (category === 'user') {
        //         readPermission = 'Read User';
        //     }


        //     let readSelected = false;
        //     for (let permission of category === 'project' ? projectPermissions : category === 'task' ? taskPermissions :
        //             userPermissions) {
        //         if (permission !== readPermission && document.getElementById(`${category}_${permission}`).checked) {
        //             readSelected = true;
        //             break;
        //         }
        //     }


        //     if (readSelected) {
        //         document.getElementById(`${category}_${readPermission}`).checked = true;
        //         alert(`Automatically checked '${readPermission}' permission.`);
        //     }
        // }




        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                console.log(checkbox);

                if (checkbox.getAttribute("isDepend")) {
                    checkbox.setAttribute("userclicked", checkbox.checked == 1);
                    return;
                }

                let category = checkbox.getAttribute("category");

                var elements = document.querySelectorAll('[category="' + category + '"]');
                let isAnyCheck = false;
                let dependant = null;
                elements.forEach(elem => {
                    // console.log(elem);

                    if (elem.getAttribute("isDepend")) {
                        elem.checked = true;
                        dependant = elem;
                    } else {
                        if (elem.checked) {
                            isAnyCheck = true;
                        }
                    }
                });

                console.log(isAnyCheck);

                // if (!checkbox.checked && checkbox.getAttribute("isDepend"))
                if (dependant && !isAnyCheck && dependant.getAttribute("userclicked") == "false") {
                    dependant.checked = false;
                    // const dependentCheckbox = document.querySelector('[category="${category}"][isDepend]');
                    // if (dependentCheckbox) {
                    //     dependentCheckbox.checked = false;
                    // }
                }
            });
        });








        // const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        // checkboxes.forEach(checkbox => {
        //     checkbox.addEventListener('change', () => {
        //         console.log(checkbox);
        //         let category = checkbox.getAttribute("category");

        //         var elements = document.querySelectorAll('[category="' + category + '"]');
        //         elements.forEach(elem=>{
        //             if(elem.getAttribute("isDepend")){
        //                 elem.checked = true;
        //                 // console.log(elem.getAttribute("isDepend"));
        //                 return;
        //             }


        //         })

        //     });

        // });
    </script>
@endsection
