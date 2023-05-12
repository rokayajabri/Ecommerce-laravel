<!DOCTYPE html>
<html>
<head>
    <title>Facturation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Your total bills:</p>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>price</th>
            <th>qantity</th>
            <th>subtotal</th>
            <th>tax</th>
            <th>total</th>
        </tr>
        @foreach ( Cart::content() as $item )
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->model->nom_produit }}</td>
            <td>{{ $item->model->prix }}</td>
            <td>{{ $item->qty }}</td>
            <td>${{Cart::subtotal()}}</td>
            <td>${{Cart::tax()}}</td>
            <td>${{Cart::total()}}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
