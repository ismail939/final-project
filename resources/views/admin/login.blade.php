<!doctype html>
<html lang="en">
<link>
<meta charset="UTF-8">
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin login</title>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <form action="{{route('admin.home')}}" method="post" id="loginForm">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" id="name" placeholder="enter your name"><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password" placeholder="enter your password"><br>
        <input type="submit" value="login" class="submit">
    </form>
</body>

</html>
