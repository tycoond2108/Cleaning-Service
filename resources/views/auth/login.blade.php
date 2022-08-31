@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/new-user.css')}}">
@endsection

@section('title')
Log In
@endsection

@section('content')

<h1 class="heading"> <i class="fas fa-broom"></i>Login<i class="fas fa-broom"></i> </h1>

<div class="form-container">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!----->
        <div class="row">
            <div class="label">
                <label>Email</label>
            </div>
            <div class="field">
                <input type="text" id="username" name="email" placeholder="Email Address" required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Password</label>
            </div>
            <div class="field">
                <input type="password" id="Password" name="password" placeholder="Password" required />
                <!-- Remember Me -->
                <div class="block mt-4">
                    <span style="font-size:15px;">Remember Me</span>
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                    </label>
                </div>
                <label>not a user? <a href="/register">register</a> now</label>

            </div>
        </div>
        <!---->
        <div class="row">
            <input type="submit" value="login" style="float: left;">
            <a href="/" class="btn" style="float: right;">back</a>
        </div>
    </form>
</div>

@endsection

@section('scripts')

@endsection