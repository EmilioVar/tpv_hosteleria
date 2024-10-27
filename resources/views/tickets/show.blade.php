<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @media print {
                .ocultar-al-imprimir {
                    display: none;
                }
            }
        </style>
    <title>ticket</title>
</head>

<body>
    <div class="ocultar-al-imprimir m-2">
        <a class="p-2 border-2 rounded-md bg-blue-200 text-blue-700 " href="{{ route('index') }}">Volver</a>
    </div>
    <div class="text-[.9em]">
        <p>Bar Monte Ararat</p>
        <p>X8222827M</p>
        <p>C/ CONDE DE LUMIARES 4</p>
        <p>46019 Valencia</p>
        <p>Ticket {{ $ticket->id }}</p>
    </div>
    <br>
    <section>
        <hr>
        <table class="text-[.8em]">
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
                        <td>{{ $product['name'] }}</td>
                        <td classs="text-center">{{ $product['pivot']['price'] }}</td>
                        <td classs="text-center">{{ $product['pivot']['quantity'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h4>Total: <strong>{{ $ticket->total_ticket }}</strong></h4>
    </section>
    <br>
    <section>
        <p>Forma pago: {{ $ticket->type_pay }}</p>
    </section>
    <br>
    <p>¡Gracias por venir!</p>
    <p>
        Շնորհակալություն
        <br>
        այցելության
        <br>
        համար
    </p>
    <script>
        window.print();
    </script>
</body>

</html>
