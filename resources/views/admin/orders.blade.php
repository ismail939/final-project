<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orders</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Order id</th>
                <th>Order price</th>
                <th>User name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{$order->user->name}}</td>

                        {{-- <a href="{{route('product.show',$product->product_id)}}">show</a> --}}
                        {{-- <form action="{{ route('product.show', $product->id) }}" method="get">
                            <button>Show</button>
                        </form> --}}
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>
