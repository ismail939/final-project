<!doctype html>
<html lang="en">
<link>
<meta charset="UTF-8">
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Register</title>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <form action="{{ route('userHome') }}" method="GET" id="loginForm" enctype="multipart/form-data">
        <label>Name</label><br>
        <input type="text" name="name" id="name" placeholder="enter your full name"><br>
        <label>Email</label><br>
        <input type="email" name="email" id="email" placeholder="enter your email"><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password" placeholder="enter your password"><br>
        <label>Address</label><br>
        <input type="text" name="address" id="address" placeholder="enter your address"><br>
        <label>Profile picture</label><br>
        <input type="file" name="img" id="img"><br>
        <input type="submit" value="submit" class="submit">

    </form>

</body>

</html>
