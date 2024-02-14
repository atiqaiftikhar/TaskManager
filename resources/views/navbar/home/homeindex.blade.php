@extends('layouts.masterfront')
@section('content')
<div
    class="bg-image"
    style="
      background-image: url('assets/img/bgw.png');
      height: 100vh;
    "
  >
<br>
<br>

<br>
<br>
    <h1  style="text-align: center;   font-weight: bold; color: #d7e2e7; " >Secure Task Management</h1>

    <p style="text-align: center; margin-top: 20px; color: #47a5c7;  font-weight: bold;">With Asana, you can drive  clarity and impact</p>

    <p style="text-align: center; margin-top: 20px; color: #49a6c8;  font-weight: bold;">
        at scale by connecting work and workflows to company-wide
    </p>

    <div class="containerm">

            <form action="#" class="sign-up-form d-flex email-form" data-aos="fade-up" data-aos-delay="300">
            @csrf

            <input type="email" id="email" name="email" style="color: #7baabf;" class="rounded-input"  value="Enter your email address...">
            <input type="submit" class="btn btn-custom rounded-pill" value="Sign up">
        </form>


    </div>

</div>
<br>
<br>


<div class="row container">
    <div class="col-3">
        <div class="card rounded-custom bg-primary text-white" style=" border-radius: 15px;">
            <div class="card-body">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img height="100" width="90" src="assets/img/Security Shield Logo (1).png">

            </div>
          </div>


    </div>
    <div class="col-3">

        <div class="card rounded-custom bg-primary text-white" style=" border-radius: 15px;">
            <div class="card-body">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img src="https://cdn4.meistertask.com/assets/content/home/2021/teams-3d3ce8ac143330b5db3d9bf84fa28440132b2d0432d63f26c68c23ec7038ee5e.svg">

            </div>
          </div>

    </div>
    <div class="col-3">

        <div class="card rounded-custom bg-primary text-white" style=" border-radius: 15px;">
            <div class="card-body">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img src="https://cdn4.meistertask.com/assets/content/home/2021/award-c49ef077a64650fd4e7d21d9bab01fe057e15bd31d248a5ad27b5d96916a9ff1.svg">

            </div>
          </div>

    </div>


    <div class="col-3">

        <div class="card rounded-custom bg-primary text-white" style=" border-radius: 15px;">
            <div class="card-body">
              {{-- <h5 class="card-title">Card Title</h5> --}}
              <img src="https://cdn4.meistertask.com/assets/content/home/2021/award-c49ef077a64650fd4e7d21d9bab01fe057e15bd31d248a5ad27b5d96916a9ff1.svg">

            </div>
          </div>

    </div>

</div>
<br>
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



<img width="100%" src="assets/img/wave.svg">

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

@endsection

