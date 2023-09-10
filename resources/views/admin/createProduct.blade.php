<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create product</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>

<body>
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label>Name</label><br>
        <input type="text" name="name" placeholder="product_name"><br>
        <label>Price</label><br>
        <input type="text" name="price" placeholder="product_price"><br>
        <label>Availability</label><br>
        <input type="text" name="availability"placeholder="product_availability"><br>
        <label>Category_id</label><br>
        <input type="text" name="category_id"placeholder="category_id"><br>
        {{-- <input type="text" name="admin_id" placeholder="admin_id"> --}}
        <label>Picture</label><br>
        <input type="file" name="image"><br>
        <input class="button" type="submit">


    </form>
</body>

</html>
