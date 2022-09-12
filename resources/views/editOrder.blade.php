<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Edit order</title>
</head>

<body>
    <div class="container">
        <a href="{{ Route('dashboard') }}">Back</a>
        <hr>
        <h3>Edit the order no.{{ $order->id }}</h3>
        <form method="POST" action="{{ Route('editOrder', $order->id) }}">
            @csrf
            <div class="form-group">
                <label>title</label>
                <input type="text" class="form-control" name="title" placeholder="title"
                    value="{{ $order->title }}">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" class="form-control" name="description" placeholder="description"
                    value="{{ $order->description }}">
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price" placeholder="price"
                    value="{{ $order->price }}">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>
</body>

</html>
