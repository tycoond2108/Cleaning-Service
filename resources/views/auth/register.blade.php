@extends('layouts.base')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/new-user.css')}}">

@endsection

@section('title')
Register
@endsection

@section('content')

<h1 class="heading"> <i class="fas fa-broom"></i>New User <i class="fas fa-broom"></i> </h1>

<div class="form-container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!----->
        <div class="row">
            <div class="label">
                <label>First Name</label>
            </div>
            <div class="field">
                <input type="text" id="fname" name="firstname" placeholder="Firstname.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Last Name</label>
            </div>
            <div class="field">
                <input type="text" id="lname" name="lastname" placeholder="Your last name.." required />
            </div>
        </div>
        
        <div class="row">
            <div class="label">
                <label>User Name</label>
            </div>
            <div class="field">
                <input type="text" id="username" name="username" placeholder=" Enter Your User name.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>E-mail</label>
            </div>
            <div class="field">
                <input type="email" id="email" name="email" placeholder=" Enter Your email.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Phone number</label>
            </div>
            <div class="field">
                <input type="text" id="email" name="phone" placeholder=" Enter Your phone number" required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Country</label>
            </div>
            <div class="field">
                <input type="text" id="country" name="country" placeholder=" your country.." required />
            </div>
        </div>
        <!---->
        <!---->
        <div class="row">
            <div class="label">
                <label>Address</label>
            </div>
            <div class="field">
                <input type="text" id="address" name="address" placeholder=" Enter Your address.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>State</label>
            </div>
            <div class="field">
                <input type="text" id="state" name="state" placeholder=" Enter Your state.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>City</label>
            </div>
            <div class="field">
                <input type="text" id="city" name="city" placeholder="Enter Your city.." required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Register As:</label>
            </div>
            <div class="field">
                <select id="Type" name="role_id">
                    <option value="2">Customer</option>
                    <option value="3">Cleaner</option>
                </select>
            </div>
            <div id="price" class="field">
                
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>ZIP code</label>
            </div>
            <div class="field">
                <input type="number" id="zipcode" name="zip" placeholder=" Your zipcode.." required />
            </div>
        </div>

        <!---->
        <div class="row">
            <div class="label">
                <label>Language</label>
            </div>
            <div class="field">
                <input type="text" id="Language" name="language" placeholder=" Your Language" required />
            </div>
        </div>
        <!---->
        
        <div class="row">
            <div class="label">
                <label>Date of birth</label>
            </div>
            <div class="field">
                <input type="date" id="DOB" name="birthdate" placeholder=" Your date of birth" required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Passowrd</label>
            </div>
            <div class="field">
                <input type="password" id="Password" name="password" placeholder="Enter your password" required />
            </div>
        </div>
        <!---->
        <div class="row">
            <div class="label">
                <label>Re-enter Passowrd</label>
            </div>
            <div class="field">
                <input type="password" id="Re-Password" name="password_confirmation" placeholder="Re-Enter your password" required />
            </div>
        </div>
        <!---->
        <br>
        <!---->
        <div class="row">
            <input type="submit" value="Submit" style="float: left;">
            <a href="/" class="btn" style="float: right;">Back</a>
        </div>
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
        <!---->
    </form>
</div>

@endsection

@section('scripts')
<script>
    var priceDiv = document.getElementById("price");
    var regAs = document.getElementById("Type");

    function addPriceField(){
        priceDiv.innerHTML = "";

        if(regAs.value == 3){
            priceDiv.innerHTML= "<div class='label'><label>Price Per Hour</label></div><input id='priceInput' type='number' name='price_per_hour' required />";
        }

    }

    document.getElementById("Type").addEventListener("change", addPriceField);

</script>
@endsection