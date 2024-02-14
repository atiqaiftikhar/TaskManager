@if (Session::has('success'))
    <div id="success-alert" class="alert alert-success bg-success alert-dismissiable" role="alert">
        <strong class="text-white">Success !</strong>
        <span class="text-white">{{ session('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (Session::has('error'))
    <div id="error-alert" class="alert alert-danger bg-danger alert-dismissiable" role="alert">
        <strong class="text-white">ERROR !</strong>
        <span class="text-white">{{ session('error') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    // Dismiss the success alert after 5 seconds
    setTimeout(function() {
        $('#success-alert').alert('close');
    }, 5000);

    // Dismiss the error alert after 5 seconds
    setTimeout(function() {
        $('#error-alert').alert('close');
    }, 5000);
</script>

