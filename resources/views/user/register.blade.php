<!doctype html>
<html lang="en">
<link>
<meta charset="UTF-8">
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Register</title>
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
                
            </ul>
        </nav>
    </div>
    <form action="{{ route('register.store') }}" method="POST" id="loginForm" enctype="multipart/form-data">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" id="name" placeholder="enter your full name" required><br>
        <label>Email</label><br>
        <input type="email" name="email" id="email" placeholder="enter your email" required><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password" placeholder="enter your password" required><br>
        <label>Phone</label><br>
        <input type="text" name="phone" id="phone" placeholder="enter your phone number" required><br>
        <label>Address</label><br>
        <input type="text" name="address" id="address" placeholder="enter your address" required><br>
        <label>Profile picture</label><br>
        <input type="file" name="image" id="image" required><br>
        <input type="submit" value="submit" class="submit">

    </form>

</body>

</html>
