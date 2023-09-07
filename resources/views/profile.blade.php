<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
    <fieldset>
        <legend>
            User details
        </legend>
        <table>
            <tr><td><img src="images/{{$user->image}}" alt="profile pic"></td></tr>
            <tr>
                <td>$user->name</td>
                <td>$user->address</td>
                <td>$user->phone</td>
                <td>$user->email</td>
            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend>
            Purchase history
        </legend>
    </fieldset>
</body>
</html>
