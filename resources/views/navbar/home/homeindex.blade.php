@extends('layouts.masterfront')
@section('content')
{{-- <div
    class="bg-image"
    style="
      background-image: url('assets/img/bgw.png');
      height: 100vh;
    "
  > --}}




  <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('assets/img/carousels1.png')}}" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/img/carousels2.png')}}" alt="" class="d-block w-100">
      </div>
      <div class="carousel-item">
        <img src="{{asset('assets/img/carousel3.png')}}" alt="" class="d-block w-100">
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
<br>

<div class="container">
    <h3 class="text-center">
        The Need for Task Management
    </h3>
    <h1 class="text-center">
        It’s Time to Get Organized.
    </h1>
<p class="text-center">
    Task management is the link between planning to do something and getting it done. Your task management software should provide an overview of work in progress that enables tracking from conception to completion. Enter MeisterTask: join teams everywhere who use our Kanban-style project boards to digitalize workflows and gain a clear overview of task progress. Let's get organized together!

</p>
</div>
<img width="100%" height="350" src="assets/img/wave.svg">
<div class=" row container">

    <div class="col-md-6">
    <img  src="assets/img/pic2.svg">

    </div>
    <div class="col-md-6">
      <h3>
        Get to Know Task Management
      </h3>
      <h1>
        Talk to a
      </h1>
      <h2>
        Productivity
      </h2>
<h2>
  Expert.
</h2>




    </div>




</div>
<div class="text-center" style="background-color: powderblue">
    <img  height="100" width="100" src="assets/img/home2.png">
<h4>From To-do, To Doing, To Done</h4>
<h2>Get the Overview With TaskEase</h2>
<a href="#" class="btn btn-lg btn-light btn-outline-dark rounded-pill">Features</a>
<br>
    </div>



    {{-- <div class="containerm">

            <form action="#" class="sign-up-form d-flex email-form" data-aos="fade-up" data-aos-delay="300">
            @csrf

            <input type="email" id="email" name="email" style="color: #7baabf;" class="rounded-input"  value="Enter your email address...">
            <input type="submit" class="btn btn-custom rounded-pill" value="Sign up">
        </form>


    </div> --}}
<br>



<div class="row container">
    <div class="col-3">
        <div class="card rounded-custom  " style=" border-radius: 15px;">
            <div class="card-body text-center">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img height="100%" width="100%" src="assets/img/security.png">
              <h4>Secure</h4>
              <p>and compliant</p>

            </div>
          </div>


    </div>
    <div class="col-3">

        <div class="card rounded-custom  " style=" border-radius: 15px;">
            <div class="card-body text-center">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img height="100%" width="100%" src="assets/img/1.png">
              <h4>Happy teams</h4>
              <p>worldwide</p>

            </div>
          </div>

    </div>
    <div class="col-3">

        <div class="card rounded-custom " style=" border-radius: 15px;">
            <div class="card-body text-center">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img height="100%" width="100%" src="assets/img/tracking.png">
     <h4>Time Tracking</h4>
     <p> and deadlines</p>
            </div>
          </div>

    </div>


    <div class="col-3">

        <div class="card rounded-custom " style=" border-radius: 15px;">
            <div class="card-body">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img src="https://cdn4.meistertask.com/assets/content/home/2021/award-c49ef077a64650fd4e7d21d9bab01fe057e15bd31d248a5ad27b5d96916a9ff1.svg">

            </div>
          </div>

    </div>

</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-6">
            <br>
            <br>
            <br>
            <h2>Task Management?</h2>
            <p>Productive. Efficient. On time. Task management software helps you guide tasks effortlessly from to-do, to doing, to done. Bring order to your team’s daily business and create future-proof workflows with MeisterTask.</p>

        </div>
        <div class="col-6">
            <img height="100%" width="100%" src="assets/img/task3.svg">
        </div>

    </div>



</div>







@endsection

