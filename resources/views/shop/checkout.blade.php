<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <h4>Your total price is: {{$total}}</h4>
    <form action="{{route('checkoutFinish')}}" method="post">
        @csrf

    </form>
</body>
</html>
