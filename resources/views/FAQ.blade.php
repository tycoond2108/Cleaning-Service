@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/FAQ-style.css')}}">

@endsection

@section('title')
FAQs
@endsection

@section('content')

<h1 class="faq-heading">FAQ'S</h1>
<section class="faq-container">
  <div class="faq-one">
    <!-- faq question -->
    <h1 class="faq-page">How to cancel an order?</h1>
    <!-- faq answer -->
    <div class="faq-body">
      <p>You can easaly by contactinng us on our soical media or by calling the cleaner on phone </p>
    </div>
  </div>
  <hr class="hr-line">
  <div class="faq-two">
    <!-- faq question -->
    <h1 class="faq-page">How often will you clean my home?</h1>
    <!-- faq answer -->
    <div class="faq-body">
      <p>Customized house cleaning services are available weekly, every other week, 3 week rotations or monthly service. Each home is custom bid to meet the customer’s needs with a guarantee on the quality of work performed.</p>
    </div>
  </div>
  <hr class="hr-line">
  <div class="faq-three">
    <!-- faq question -->
    <h1 class="faq-page">Where can I see who is coming to clean?</h1>
    <!-- faq answer -->
    <div class="faq-body">
      <p>you can take a look at the cleaner's profile before hireing him/her</p>
    </div>
  </div>
</section>


@endsection

@section('scripts')

@endsection