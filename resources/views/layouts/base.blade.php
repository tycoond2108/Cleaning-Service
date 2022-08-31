<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('imgs/ts_logo.png')}}">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    @yield('stylesheets')
    @yield('headerScripts')
    <title>@yield('title')</title>
</head>

<body>

    <!-- header section starts  -->
    <header>

        <div id="menu" class="fas fa-bars"></div>

        <a href="/" class="logo"><img src="{{asset('/imgs/ts_logo.png')}}"> cleaner</a>

        <nav class="navbar">
            <a href="/">Home</a>
            <a href="/welcome">Welcome</a>
            <a href="#footer">Available In?</a>
            <a href="/cleaners">Cleaners</a>
            <a href="/how-it-work">How it works</a>
            <a href="/faq">FAQs</a>
            @if(Auth::user())
            @if(Auth::user()->role_id == 1)
            <a href="/admin">Admin Panel</a>
            @endif
            @endif
        </nav>

        @if(Auth::user())
        <div style="font-size: 20px; padding-right: 0px;">
            <a href="/users/{{Auth::user()->id}}" class="fas fa-user"> My Profile</a>
        </div>

        <div class="logout" style="font-size:15px; padding-right:100px;">
            <form action="/logout" method="POST">
                @csrf
                <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();"><button class="logout-btn">Log out</button></a>
            </form>
        </div>

        @else
        <div style="font-size: 15px;">
            <a href="/login"><button class="login-btn">Log in</button>
            </a><a href="/register"><button class="blue-btn">Get started</button></a>
        </div>

        @endif

    </header>
    <!-- header section ends -->

    <!-- Handling Flash Messages -->
    @if(count($errors) > 0)
    <div class="alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session()->has('success'))
    <div class="alert-success" role="alert">{{session()->get('success')}}</div>
    @endif

    @if(session()->has('danger'))
    <div class="alert-danger" role="alert">{{session()->get('danger')}}</div>
    @endif
    <!-- Handling flash messages end -->

    <!-- Page Content -->
    @yield('content')
    <!-- Page contet ends -->

    <!-- footer section  -->
    <section class="footer" id="footer">

        <div class="share">
            <a href="#" class="btn">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="btn">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="btn">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="btn">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#" class="btn">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <div class="box-container">
            <div class="row">

                <div class="column"><b  style="font-size:25px">Available in</b><br>London
                    East London, North London, South East London, South London
                </div>
                
                <div class="column"><b  style="font-size:25px">Services</b><br>Deep clean, End of tenancy clean, After builders clean</div>
                <div class="column"><b style="font-size:25px">Explore</b>
                    <a href="/">Home</a>
                    <a href="/cleaners">Cleaners</a>
                    <!----####------->
                    <a href="/how-it-work">How it works ?</a>
                    <a href="/faq">FAQs</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer section ends -->

    <!-- jquery cdn link  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{asset('js/main.js')}}"></script>

    @yield('scripts')
</body>

</html>