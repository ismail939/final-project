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
                <th>Category id</th>
                <th>Category name</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
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
