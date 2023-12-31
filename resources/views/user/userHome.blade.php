<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/userHome.css') }}">

</head>

<body>
    <div class="nav-container">
        <nav class="navbar">
            <h1 id="navbar-logo">Ismail's</h1>
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-menu">
                <li><a href="{{ route('userHome.show', $user->id) }}" class="nav-links" id="homeLink">Home</a></li>
                <li><a href="{{ route('profile', $user->id) }}" class="nav-links" id="profileLink">Profile</a></li>
                <li><a href="#" class="nav-links">About</a></li>
                <li><a href="#" class="nav-links">Contact Us</a></li>
                <li class="nav-links">
                    <form action="{{route('product.shoppingCart')}}">
                        <button>Cart</button>
                    </form>
                    (<span>{{Session::has('cart')?Session::get('cart')->totalQty:0}}</span>)</li>
                <li><a href="{{ route('logout') }}" class="nav-links nav-links-btn">Logout</a></li>
                <li><img class="nav-links" src="/images/{{ $user->image }}" alt="profile pic" height="50px"
                        width="50px"></li>

            </ul>
        </nav>
    </div>

    <form action="{{ route('profile', $user->id) }}" method="GET">
        <button id="profile" class="search">Profile</button>
    </form>
    {{-- <a href="{{route('profile')}}">Profile</a> --}}
    <form action="{{route('productSearch')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Search..">
        <button class="search" id="search">Search</button>
    </form>
    <form action="{{route('userHome.show', $user->id)}}">
        <button class="search">Cancel</button>
    </form>

    <br>
    {{-- <form action="{{ route('userHome.order', $user->id) }}" method="GET">
        <button id="" class="search">Start Order</button>
    </form> --}}
    <br>
    <div id="productsDiv">
        @foreach ($products as $product)
            <div class="divClass">
                <img src="/images/{{ $product->image }}" alt="product image" height="400px" width="400px">
                <br>
                <span class="nameOfProduct" id="nameOfProduct">{{ $product->name }}</span>
                <br>
                <span class="priceOfProduct" id="priceOfProduct">Price:{{ $product->price }}</span>
                <br>
                <form action="{{route('product.addToCart',$product->id)}}">
                    <button class="buy" id="buy">Buy</button>
                </form>



            </div>
        @endforeach
    </div>

</body>

</html>
