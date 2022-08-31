@extends('layouts.base')

@section('stylesheets')

@endsection

@section('title')
FAQs
@endsection

@section('content')

<section class="how" id="how">
  <h1 class="heading"> <i class="fas fa-broom"></i> How it works <i class="fas fa-broom"></i> </h1>

  <div class="box-container">
    <div class="row">
      <div class="column">
        <img src="{{asset('imgs/users.png')}}">
        1.<br> Explore local Cleaners
      </div>
      <div class="column">
        <img src="{{asset('/imgs/table.png')}}">
        2.<br> Check if cleaner is available on time
      </div>
      <div class="column">
        <img src="{{asset('/imgs/login.png')}}">
        3.<br> Fill data, and Rent a clean!
      </div>
    </div>
  </div>
</section>
<!------------->

@endsection

@section('scripts')

@endsection