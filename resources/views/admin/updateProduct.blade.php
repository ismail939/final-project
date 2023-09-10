<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update product</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>
    <form action="{{ route('product.edit', $product->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="text" name="name" value="{{ $product->name }}">
        <input type="text" name="price" value="{{ $product->price }}">
        <input type="text" name="availability" value="{{ $product->availability }}">
        <input type="text" name="category_id" value="{{ $product->category_id }}">
        {{-- <input type="text" name="admin_id" value="{{ $product->admin_id }}"> --}}
        <input type="file" name="image" value="{{$product->image}}">
        <input class="button" type="submit">


    </form>
</body>

</html>
