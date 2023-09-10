<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    <a id="button" href="{{ route('category.create') }}">Add Category</a>
    <div class="tableHere">
        <table>
            <thead>
                <tr>
                    <th>category id</th>
                    <th>category name</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            {{-- <a href="{{route('product.show',$product->product_id)}}">show</a> --}}
                            {{-- <form action="{{ route('product.show', $product->id) }}" method="get">
                                <button>Show</button>
                            </form> --}}
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</body>
</html>
