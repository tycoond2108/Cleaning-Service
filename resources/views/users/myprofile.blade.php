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
            <button class="update-photo"> <i class="fas fa-camera"></i> Edit Picture</button>
          </div>
          <div class="info">
            <h4 class="name">{{$user->name}}</h4>
            <p class="user-username">@ {{$user->username}}</p>
            <h4 class="user-email">{{$user->email}}</h4>
            <h4>{{$user->bithdate}}</h4>
            <p>{{$user->phone}}</p>
            <p>Language: {{$user->language}}</p>

          </div>
        </div>
        <!------------------------------------>
        <div class="card">
          <div class="update"><button class="update-button"> <i class="fas fa-user-edit"></i> update profile </button></div>
          <div class="content">
            <br>
            <br>
            <span class="user-bio">address</span>
            <p>{{$user->address}}</p>
            <br>
            <span class="user-bio">Country | City | State | Zip</span>
            <p>{{$user->country}} | {{$user->city}} | {{$user->state}} | {{$user->zip}}</p>
            <a href="/track-my-orders"><b>Track Your orders</b></a>
          </div>
        </div>

      </div>
    </div>
    <!-----------------end of profile pic--------->

    <div class="pop-up" id="myform">
      <form action="/users/{{$user->id}}" method="POST">
        @csrf
        <div class="inputBox">
          <label for="input-name">Firstname</label>
          <input type="text" value="{{$user->firstname}}" name="firstname">
          <label for="input-phone">Lastname</label>
          <input type="text" value="{{$user->lastname}}" name="lastname">
        </div>
        <div class="inputBox">
          <label for="input-email">Email</label>
          <input type="email" value="{{$user->email}}" name="email">
        </div>
        <div class="inputBox">
          <label for="input-username">Username</label>
          <input type="text" value="{{$user->username}}" name="username">
        </div>
        <div class="inputBox">
          <label for="input-username">Phone</label>
          <input type="text" value="{{$user->phone}}" name="phone">
        </div>
        <div class="inputBox">
          <label for="input-birthday">Birthdate</label>
          <input type="date" value="{{$user->birthdate}}" name="birthdate">
        </div>

        <div class="inputBox">
          <label for="input-username">Country</label>
          <input type="text" value="{{$user->country}}" name="country">
        </div>
        <div class="inputBox">
          <label for="input-username">State</label>
          <input type="text" value="{{$user->state}}" name="state">
        </div>
        <div class="inputBox">
          <label for="input-username">City</label>
          <input type="text" value="{{$user->city}}" name="city">
        </div>
        <div class="inputBox">
          <label for="input-username">ZIP</label>
          <input type="text" value="{{$user->zip}}" name="zip">
        </div>
        <div class="inputBox">
          <label for="input-username">Language</label>
          <input type="text" value="{{$user->language}}" name="language">
        </div>

        <div class="inputBox">
          <label for="input-username">Price Per Hour</label>
          <input type="number" value="{{$user->price_per_hour}}" name="price_per_hour">
        </div>

        <div class="aboutbox">
          <label>address</label>
          <input type="text" value="{{$user->address}}" name="address" class="bio-area">
        </div>
        <!---confirm and cancel button-->
        <input type="submit" class="btn submit" value="confirm">
        <button type="button" class="btn cancel">Cancel</button>
      </form>
    </div>
    <div class="pop-up" id="photo-form">
      <form action="/users/{{$user->id}}/update-pp" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="inputBox">
          <label for="input-photo"> upload photo</label>
          <input type="file" name="profile_picture">
        </div>
        <input type="submit" class="btn submit" value="confirm">
        <button type="button" class="btn cancel" id="cancel">Cancel</button>
      </form>
    </div>

  </div>

</section>
<!------------------------- profile SECTION END------------------>


@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $(".update-button").click(function() {
      $("#profile").hide();
    });
    $(".update-button").click(function() {
      $("#myform").show();
    })
    $(".cancel").click(function() {
      $("#myform").hide();
    })
    $(".cancel").click(function() {
      $("#profile").show();
    })
    $(".update-photo").click(function() {
      $("#profile").hide();
    });
    $(".update-photo").click(function() {
      $("#photo-form").show();
    });
    $("#cancel").click(function() {
      $("#photo-form").hide();
    })
    $("#cancel").click(function() {
      $("#profile").show();
    })

  });
</script>

@endsection