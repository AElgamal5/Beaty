<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Dash</title>
</head>

<body>
    <div class="container">
        <a href="{{ Route('logout') }}">logout</a>
        <hr>
        <h1>{{ Auth::user()->name }} is logged in !</h1>
        <hr>
        <h3>Add an order</h3>
        <form method="POST" action="{{ Route('addOrder') }}">
            @csrf
            <div class="form-group">
                <label>title</label>
                <input type="text" class="form-control" name="title" placeholder="title">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" class="form-control" name="description" placeholder="description">
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price" placeholder="price">
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
        <br>
        <hr>
        <br>
        <h3>Your orders :</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Chef ID#</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->chef_id ?? 'waiting' }}
                            </td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
