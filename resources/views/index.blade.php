@extends('layouts.base')

@section('title')
Cleaning Services
@endsection

@section('content')

<!-- home section starts  -->

<section class="home" id="home">

  <div class="content">
    <h3>brilliant local cleaners</h3>
    <p>All managed online.vetted cleaners.</p>
    <a href="/how-it-work" class="btn">get started</a>
  </div>

</section>

<!-- home section ends -->


<section class="featured" id="featured">

  <h1 class="heading"> <i class="fas fa-broom"></i> Why us ? <i class="fas fa-broom"></i> </h1>

  <div class="box-container">

    <div class="box">
      <div class="content">
        <div class="stars">
          <p>Why choose us?</p>
        </div>

        <h3>Smarter, safer, easier cleaning</h3>
        <p>We go out of our way to make the whole process as seamless as possible - from click to clean.</p>
        <a href="/cleaners" class="btn">rent a clean</a>
      </div>
    </div>

    <div class="box">
      <div class="content">
        <h3>Benefits</h3>
        <p>Full Clean</p>
        <p>Customise your clean</p>
        <p>Change or cancel in seconds</p>
        <p>Cashless payment</p>
        <p>Vetted, experienced cleaners </p>
        <p>Consistent, reliable services</p>
        <p>24/7 support</p>
      </div>
    </div>

  </div>

</section>
<!--------->
<section class="how" id="how">
  <h1 class="heading"> <i class="fas fa-broom"></i> How it works <i class="fas fa-broom"></i> </h1>

  <div class="box-container">
    <div class="row">
      <div class="column">
        <img src="{{asset('/imgs/users.png')}}">
        1.<br> for a local Cleaner
      </div>
      <div class="column">
        <img src="{{asset('/imgs/table.png')}}">
        2.<br> Choose available dates
      </div>
      <div class="column">
        <img src="{{asset('/imgs/login.png')}}">
        3.<br> Rent a clean
      </div>
    </div>
  </div>
</section>
<!------------->

<!-- deal section starts  -->

<section class="deal">

  <span>One-time clean ?</span>
  <h3>We are your best choice for One-time Cleaning</h3>
  <a href="/cleaners" class="btn">Explore the cleaners now</a>

</section>

<!-- deal section ends -->


@endsection