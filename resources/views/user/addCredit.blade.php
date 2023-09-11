<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Credit</title>
</head>
<body>
    <form action="{{route('addCreditFinish', Session::get('user')['id'])}}" method="post">
        <h1>Your current credit: {{Session::get('user')['credit']}}</h1>
        <Label>Enter credit</Label>
        <input type="text" placeholder="enter credit" name="credit">
        <button>Submit</button>
    </form>
</body>
</html>
