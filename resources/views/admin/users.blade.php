<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <table style="border-width: 1px; border-style: solid; border-color: black" >
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Profile Picture</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->email}}</td>
                <td><img src="/images/{{$user->image}}" alt="profile pic" height="50px" width="50px"></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>
