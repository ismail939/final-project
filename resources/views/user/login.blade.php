<!doctype html>
<html lang="en">
<link>
<meta charset="UTF-8">
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login</title>
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
                <li><a href="" class="nav-links" id="homeLink">Home</a></li>
                <li><a href="" class="nav-links" id="profileLink">Profile</a></li>
                <li><a href="#" class="nav-links">About</a></li>
                <li><a href="#" class="nav-links">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="nav-links nav-links-btn">Login</a></li>
                <li><a href="{{ route('register') }}" class="nav-links nav-links-btn">Register</a></li>
            </ul>
        </nav>
    </div>
    <form action="{{route('loginL')}}" method="POST" id="loginForm">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" id="email" placeholder="enter your email"><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password" placeholder="enter your password"><br>
        <input type="submit" value="login" class="submit">


    </form>
    <form action="{{ route('register') }}" method="GET"><button>register</button></form>
</body>

</html>
