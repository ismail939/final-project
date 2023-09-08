<!doctype html>
<html lang="en">
<link>
<meta charset="UTF-8">
<meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Login</title>
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
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
