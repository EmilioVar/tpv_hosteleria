<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>

<body class="flex justify-center items-center w-screen h-screen">
    <section class="bg-white bg-opacity-20 backdrop-blur-[2px] shadow-xl w-[500px] p-10 rounded-md">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="{{ asset('img/bcall-logo.png') }}"
                alt="Your Company">
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <!-- username -->
                <div>
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Nombre de
                        usuario</label>
                    <div class="mt-2">
                        <input id="username" name="username" type="text" value="{{ old('username') }}"
                            autocomplete="username"
                            class="@error('username') is-invalid @enderror block w-full p-2 rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('username')
                            <p class="text-[.8em] text-red-500 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- password -->
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password"
                            class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            class="@error('password') is-invalid @enderror block w-full p-2 rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        @error('password')
                            <p class="text-[.8em] text-red-500 font-bold">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Iniciar sesión</button>
                </div>
            </form>
            <div class="mt-3">
                <p>Laravel v{{ App::VERSION() }}</p>
            </div>
        </div>
    </section>
</body>

</html>