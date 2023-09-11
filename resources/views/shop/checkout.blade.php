<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/userHome.css') }}">
</head>
<body>
    <h1>Checkout</h1>
    <h4>Your total price is: {{$total}}</h4>
    <form action="{{route('checkoutFinish')}}" method="post">
        @csrf
        Your Credit: {{Session::get('user')['credit']}}
        <br>
        <button>Submit</button>
    </form>
</body>
</html>
