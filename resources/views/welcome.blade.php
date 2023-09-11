<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-commerce</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Edu+SA+Beginner:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/userHome.css') }}">

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
                <li><a href="" class="nav-links" id="homeLink">Home</a></li>
                <li><a href="" class="nav-links" id="profileLink">Profile</a></li>
                <li><a href="#" class="nav-links">About</a></li>
                <li><a href="#" class="nav-links">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="nav-links nav-links-btn">Login</a></li>
                <li><a href="{{ route('register') }}" class="nav-links nav-links-btn">Register</a></li>
            </ul>
        </nav>
    </div>
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

    <script>
        let homeLink = document.getElementById("homeLink");
        let profileLink = document.getElementById("profileLink");

        homeLink.addEventListener('click', function() {
            alert("You should log in first");
        });

        profileLink.addEventListener('click', function() {
            alert("You should log in first");
        });
    </script>
</body>

</html>
