<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
</head>
<body>
    @if(Session::has('cart'))
        <div>
            <div>
                <ul>
                    @foreach ($products as $product)
                        <li>
                            <span>{{$product['qty']}}</span>
                            <strong>{{$product['item']['name']}}</strong>
                            <span>{{$product['price']}}</span>
                            <form action="">
                                <button>remove one</button>
                            </form>
                            <form action="">
                                <button>remove all</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div>
            <span>Total Price:{{$totalPrice}}</span>
        </div>
        <div>
            <form action="{{route('checkout')}}">
                <button>
                    Checkout
                </button>
            </form>
        </div>
    @else
        <div>
            <h2>No items in cart!</h2>
        </div>
    @endif
</body>
</html>
