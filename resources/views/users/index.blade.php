@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/cleaners-style.css')}}">

@endsection

@section('title')
  Cleaners
@endsection

@section('content')

<section class="packages" id="packages">
    <h1 class="heading">
    <i class="fas fa-paw"></i>
        <span>c</span>
        <span>l</span>
        <span>e</span>
        <span>a</span>
        <span>n</span>
        <span>e</span>
        <span>r</span>
        <span>s</span>
        <i class="fas fa-paw"></i>
    </h1>
    <!----------the container that hold all boxs -->

    <div class="box-container" id="results">
        <!------------each box contain image info and price------>
        @foreach($users as $user)
        <div class="box">
            <img src="{{asset('imgs')}}/{{$user->profile_picture}}" alt="">
            <div class="content">
                <h3> <a href="/users/{{$user->id}}">@ {{$user->username}}</a></h3>
                <p>name: {{$user->name}} | Phone: {{$user->phone}}<br> Language: {{$user->language}} | Country: {{$user->country}}<br>State: {{$user->state}} | City: {{$user->city}}</p>
                <div class="price">$<b>{{$user->price_per_hour}}</b>/hr</div>
                <a href="/rent/{{$user->id}}" class="btn">Rent This Cleaner</a>
            </div>
        </div>
        @endforeach
    </div>

</section>
<!--================package SECTION END============-->
@endsection

@section('scripts')

@endsection