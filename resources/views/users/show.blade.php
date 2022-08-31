@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/profile-style.css')}}">
@endsection

@section('headerScripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('title')
{{$user->name}}
@endsection

@section('content')
<section class="profile">
  <h1 class="heading">
    <span><i class="fa fa-fw fa-user"></i></span>
    @if($user->role_id == 2)
    <span>C</span>
    <span>u</span>
    <span>s</span>
    <span>t</span>
    <span>o</span>
    <span>m</span>
    <span>e</span>
    <span>r</span>
    @elseif($user->role_id == 3)
    <span>C</span>
    <span>l</span>
    <span>e</span>
    <span>a</span>
    <span>n</span>
    <span>e</span>
    <span>r</span>
    @elseif($user->role_id == 1)
    <span>A</span>
    <span>d</span>
    <span>m</span>
    <span>i</span>
    <span>n</span>
    @endif
  </h1>

  <div class="row">
    <div class="profile-container" id="profile">
      <div class="profile-card">
        <div class="user-image">
          <div class="image">
            <img src="{{asset('imgs/')}}/{{$user->profile_picture}}" alt="this image contains user-image">
          </div>
          <div class="info">
            <h4 class="name">{{$user->name}}</h4>
            <p class="user-username">@ {{$user->username}}</p>
            <h4 class="user-email">{{$user->email}}</h4>
            <h4>{{$user->bithdate}}</h4>
            <p>{{$user->phone}}</p>
            <p>Language: {{$user->language}}</p>
            @if($user->role_id == 3)
            <p>Price per hour: <b>{{$user->price_per_hour}}$</b></p>
            @endif
          </div>
        </div>
        <!------------------------------------>
        <div class="card">
          <div class="content">
            <br>
            <br>
            <span class="user-bio">address</span>
            <p>{{$user->address}}</p>
            <br>
            <span class="user-bio">Country | City | State | Zip</span>
            <p>{{$user->country}} | {{$user->city}} | {{$user->state}} | {{$user->zip}}</p>
          </div>
        </div>

      </div>
    </div>
    <!-----------------end of profile pic--------->

  </div>

</section>
<!------------------------- profile SECTION END------------------>
@endsection

@section('scripts')

@endsection