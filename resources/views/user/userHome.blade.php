<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
</head>

<body>
    <div class="nav-container">
        <nav class="navbar">
            <h1 id="navbar-logo">Ismail's</h1>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-menu">
                <li><a href="{{route('userHome.show', $user->id)}}" class="nav-links" id="homeLink">Home</a></li>
                <li><a href="{{route('profile', $user->id)}}" class="nav-links" id="profileLink">Profile</a></li>
                <li><a href="#" class="nav-links">About</a></li>
                <li><a href="#" class="nav-links">Contact Us</a></li>

                <li><a href="{{ route('login') }}" class="nav-links nav-links-btn">Logout</a></li>

            </ul>
        </nav>
    </div>
    <h2>{{ $user->name }}</h2>
    <h3>{{session('user_id')}}</h3>
    <form action="{{ route('profile', $user->id) }}" method="GET">
        <button>Profile</button>
    </form>
    {{-- <a href="{{route('profile')}}">Profile</a> --}}
    <button id="searchbtn">Search</button>
</body>

</html>
