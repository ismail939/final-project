<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <form action="{{ route('product.index') }}" method="GET"><button>Products</button></form>
    <form action="{{ route('admin.users') }}" method="GET"><button>Users</button></form>
    <form action="{{ route('order.index') }}" method="GET"><button>Orders</button></form>
    <form action="{{ route('register') }}" method="GET"><button>Categories</button></form>
</body>
</html>
