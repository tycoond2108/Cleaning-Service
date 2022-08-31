@extends('layouts.base')

@section('stylesheets')

@endsection

@section('headerScripts')

@endsection

@section('title')
Welcome
@endsection

@section('content')
<div class="welcomeDiv">
  <div>
    <h1>All rights reserved for: <a href="https://www.linkedin.com/in/ahmed-amin0001/">Ahmed Amin</a></h1>
  </div>
  <h2>Brief about the project:</h2>
  <h3>Cleaning Services 'narrow scale' Management System</h3>
  <p><b>Cleaners:</b> can signup, set their profiles, and be avaliable for renting for a one of the available cleaning services, Once the cleaner got an order, he can accept or decline this order.<br><b>Customers:</b> can signup, explore cleaners and rent cleaner for a unique time<br><b>Admin:</b> manage the whole process.<br>Renting a cleaner for a specefic time, works perfectly, For example, if the cleaner has an order from 4-8, and you decided to rent him from 5-6, the validation will won't let this order processes and will flash that the cleaner isn't available.</p>
  <h2>Log in info </h2>
  <p><b>Admin: </b>Email : "admin@example.com", Password: "00000000"<br><b>Customer: </b>Email : "manoj@example.com", Password: "00000000"<br><b>Cleaner: </b>Email: "hoda@example.com", Password: "00000000"</p>
  <h3><b>Very important: Uploading images to the website server is disapled as I'm using a free host(I'm so sorry)
</b></h3>
</div>
@endsection

@section('scripts')

@endsection