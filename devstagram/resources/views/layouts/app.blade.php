<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devstagram - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="bg-gray-100">
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('login') }}">
                <h1 class="text-3xl font-black">DevStagram</h1>
            </a>
            {{--------------------------------- Menú ------------------------------------------------}}
            @auth
            <nav class="flex gap-2 items-center">
                <a href="#" class="font-bold text-gray-600 text-sm">
                    Hola <span class="font-normal">{{auth()->user()->username}}</span>
                </a>
                <form action="{{ route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Cerrar sesión</button>
                </form>
            </nav>
            @endauth

            @guest
            <nav class="flex gap-2 items-center">
                <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
            </nav>
            @endguest
        </div>
    </header>

    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">@yield('titulo')</h2>
        @yield('contenido')
    </main>

    <footer class="text-center p-5 mt-10 text-gray-500">
        DevStagram - Todos los derechos reservados {{ now()->year }}
    </footer>
</body>

</html>