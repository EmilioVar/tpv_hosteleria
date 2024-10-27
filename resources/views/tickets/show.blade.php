<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>ticket</title>
</head>

<body>
    <p>Bar Monte Ararat</p>
    <p>X8222827M</p>
    <p>C/ CONDE DE LUMIARES 4</p>
    <p>46019 Valencia</p>
    <p>Ticket {{ $ticket->id }}</p>
    <br>
    <section>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ Str::limit($product['name'], 5) }}</td>
                        <td>{{ $product['pivot']['price'] }}</td>
                        <td>{{ $product['pivot']['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4>Total: <strong>{{ $ticket->total_ticket }}</strong></h4>
    </section>
    <br>
    <section>
        <p>Forma pago: {{ $ticket->type_pay }}</p>
    </section>
    <br>
    <p>¡Gracias por venir!</p>
    <p>
        Շնորհակալությունç
        <br>
        գալու
        <br>
        համար:
    </p>
</body>

</html>
