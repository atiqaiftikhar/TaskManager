<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TaskEase</title>
	<link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/font-awesome.min.css')}}">
	<script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}" type="text/javascript" charset="utf-8" async defer></script>

    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFOnpDpii0CWuVAiFuKTBzKFusLwE8NLzqVW80NbJQxTC1QwkTlnD9cO7z39" crossorigin="anonymous"></script>

    <style>
          .navbar {
        height: 70px;
    }
        /* body {
    background-image: url('assets/img/Black Blue Modern Linktree Background  .png');
    background-size: cover;
    background-position: center;
    height: 100vh;
    width: 100%;

} */

/* Make navbar transparent */
 .navbar {
    /* background-color: transparent !important; */
    opacity: 2;
}
.containerm {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
}

.email-form {
    display: flex;
    align-items: center; /* Align items vertically */
}

.email-form label {
    margin-right: 10px; /* Add some space between label and input field */
}

.rounded-input {
    border-radius: 20px;
    border: 1px solid #ccc;
    padding: 10px;
    flex: 1; /* Take up remaining space */
}
.btn-outline-custom {
    color: #47a5c7;
    border-color: #47a5c7;
}

.btn-outline-custom:hover {
    color: #fff; /* Change text color on hover */
    background-color: #47a5c7; /* Change background color on hover */
    border-color: #47a5c7; /* Change border color on hover */
}
.btn-custom {
    background-color: #47a5c7;
    border-color: #47a5c7;
    color: #fff;

}
.card {

    opacity: 0.9;
}
.custom-card {
    opacity: 0.4;

        }
        body {
    background-image: url('');
    background-size: cover;
    background-repeat: no-repeat; }

    </style>

</head>
<body>


<nav class="navbar  bg-light navbar-light navbar-expand-lg">
		<div class="container">
			<a class="navbar-brand" href="" style="color: #47a5c7;" >
			<img width="100" height="80" src="{{asset('assets/img/Logos.png')}}">TaskEase
		</a>
		<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" type="">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="menu">

		<ul class="navbar-nav m-auto">
			<li class="nav-item"><a class="nav-link" href="/" title="">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="/feature" title="">Features</a></li>
			{{-- <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="" title=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="" title="">Item1</a>
					<a class="dropdown-item" href="" title="">Item2</a>
					<a class="dropdown-item" href="" title="">Item3</a>
					<a class="dropdown-item" href="" title="">Item4</a>
				</div>
			</li> --}}
			<li class="nav-item"><a class="nav-link" href="/aboutus" title="">About US</a></li>
			{{-- <li class="nav-item"><a class="nav-link"  href="" title="">Contact US</a></li> --}}
            <li class="nav-item"><a class="nav-link"  href="/blogs" title="">Blog</a></li>
            <li class="nav-item"><a class="nav-link"  href="/taskview" title="">Taskview</a></li>
            @guest
            @if (Route::has('login'))
            <li class="nav-item {{ Request::is('login') ? 'fw-bold ' : '' }}">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}" ><i
                        class="fa fa-user icon"></i> Login</a>
            </li>
            @endif

            @if (Route::has('register'))
            <li class="nav-item {{ Request::is('register') ? 'fw-bold' : '' }}">
                <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                    href="{{ route('register') }}" ><i class="fa fa-registered"></i> Register</a>
            </li>
            @endif
            @else

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>


                    {{ ucfirst(Auth::user()->name)  }}


                </a>

                <div class="dropdown-menu dropdown-menu-end"  aria-labelledby="navbarDropdown">
                    {{-- <a  class="dropdown-item text-light" href="{{ route('profile.show', Auth::user()->id) }}"> --}}

                        <a  class="dropdown-item text-light" href=""><i class="fa fa-sign-out"></i> Profile
                        {{-- {{ Auth::user()->name }} --}}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" >
                        <i class="fa fa-sign-out"></i> Logout
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
		</ul>
		<form>

            <a class="btn btn-md btn-outline-custom rounded-pill" href="{{ route('register') }}" id="signup">Sign Up</a>


		</form>
		</div>
		</div>
	</nav>
    @yield('content')



        <div class="p-3 bg-primary" ></div>
        <a href="#" id="scrollToTop" style="display: none;"><i class="fa fa-arrow-up"></i></a>

        <div class="mt-5" ></div>
        <div class="container">
            <div class="row">
                <div class="col-sm text-center">
                    <a href=""><img src="" class="mt-2 img-fluid" width="250px" alt=""></a>
                </div>
                <hr>
                <p class="text-center">© Copyright {{ date('Y') }} | All Rights Reserved | <a
                        href="">TaskEase</a></p>
            </div>
        </div>





</body>
</html>
