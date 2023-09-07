<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <h2>{{ $user->name }}</h2>
    <form action="{{ route('profile') }}" method="GET">
        <button>Profile</button>
    </form>
    {{-- <a href="{{route('profile')}}">Profile</a> --}}
    <button id="searchbtn">Search</button>
</body>

</html>
