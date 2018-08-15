<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">

    @yield('head')

    <style>
        @yield('style')
    </style>

    <title>@yield('title')</title>
</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init(
            {
            appId            : '511146382669126',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.1'
        });

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    FB.CustomerChat.showDialog();
    }
</script>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span>Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">UEC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="@yield('home')"><a href="{{url('/')}}">Home</a></li>
                <li class="@yield('about')"><a href="{{Route('about')}}">About Us</a></li>
                <li class="@yield('activities')"><a href="{{Route('activities')}}">Activities</a></li>
                <li class="@yield('announcements')"><a href="{{Route('announcements')}}">Announcements</a></li>
                <li class="@yield('contact')"><a href="{{Route('contact_us')}}">Contact Us</a></li>

            </ul>
            <form action="{{Route('search')}}" method="post" class="navbar-form navbar-left">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button type="submit" name="search" value="search" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    @if(!Auth::user())
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Accounts <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('/login')}}">Member login</a></li>
                            <li><a href="{{Route('get_register')}}">Sign up</a></li>
                        </ul>
                    @else
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            {{Auth::user()->full_name}}  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('profile')}}">View profile</a></li>
                            @if(Auth::user()->is_admin == true)
                                <li><a href="{{Route('dashboard')}}">Dashboard</a></li>
                            @endif
                            <li><a href="{{Route('logout')}}">Log out</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
@yield('content')
<!-- Your customer chat code -->
<div class="fb-customerchat" attribution="setup_tool" app_id="511146382669126" page_id="1807333542679525" minimized="true" theme_color="#00e699"></div>

<script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>