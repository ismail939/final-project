<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Credit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/userHome.css') }}">
</head>
<body>
    <form action="{{route('addCreditFinish', Session::get('user')['id'])}}" method="post">
        @csrf
        <h1>Your current credit: {{Session::get('user')['credit']}}</h1>
        <Label>Enter credit</Label>
        <input type="text" placeholder="enter credit" name="credit">
        <button>Submit</button>
    </form>
</body>
</html>
