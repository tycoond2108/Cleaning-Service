@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/new-user.css')}}">
@endsection

@section('headerScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title')
Rent {{$cleaner->name}}
@endsection

@section('content')
<h1 class="heading"> <i class="fas fa-broom"></i>New Order For {{$cleaner->name}} <i class="fas fa-broom"></i> </h1>
<div class="label">
  <label>Kindly check <a href="/users/{{$cleaner->id}}">{{$cleaner->name}}'s</a> profile to check if he is Available by the time you need him</label>
</div>

@if(!Auth::user())
<div style="margin:50px; padding:100px;">
  <h1>Oops! It looks like you are not logged in, <a href="/login">Log in</a> now Or <a href="/register">Register</a> a new account to rent your favorite cleaner</h1>
</div>

@else
<div class="form-container">
  <form action="/rent/{{$cleaner->id}}" method="POST">
    @csrf
    <!---->
    <div class="row">
      <div class="label">
        <label>Service Type</label>
      </div>
      <div class="field">
        <select id="Type" name="service_id">
          @foreach($services as $service)
          <option value="{{$service->id}}">{{$service->name}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <!---->
    <div class="row">
      <div class="label">
        <label>Preferred language</label>
      </div>
      <div class="field">
        <input type="text" id="P-Language" name="preferred_language" placeholder=" Your Preferred Language" required />
      </div>
    </div>
    <!---->
    
    <div class="row">
      <div class="label">
        <label>How the cleaner will get into the house?</label>
      </div>
      <div class="field">
        <input type="text" id="#" placeholder="How the cleaner will get into the house?" name="house_access">
      </div>
    </div>
    <!---->
    <div class="row">
      <div class="label">
        <label>When:</label>
      </div>
      <div class="field">
        <input type="date" id="When" name="day">
      </div>
    </div>
    <!---->
    <div class="row">
      <div class="label">
        <label>From:</label>
      </div>
      <div class="field">
        <input type="time" id="When" name="from">
      </div>
    </div>
    <!---->
    <div class="row">
      <div class="label">
        <label>To:</label>
      </div>
      <div class="field">
        <input type="time" id="When" name="to">
      </div>
    </div>
    <!---->
    <div class="row">
      <div class="label">
        <label>Cost of rent you choosed:
        </label>
      </div>
      <div class="field">
        <p id="price">--</p>
      </div>
    </div>
    <!---->
    <div class="row">
      <input type="submit" value="Submit" style="float: left;">
      <a href="#" class="btn" style="float: right;">back</a>
    </div>
    <!---->
  </form>
</div>
@endif

@endsection

@section('scripts')

@endsection