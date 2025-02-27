<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicknBuy - Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

<!-- Navbar -->
<nav class="bg-green-800 text-white shadow-lg py-4">
    <div class="container mx-auto flex justify-between items-center px-6 md:px-8">
       
        <a href="/" class="text-3xl font-semibold text-teal-300 hover:text-teal-400 transition duration-300">ClicknBuy</a>


        <div class="flex space-x-6">
            <a href="/produits" class="text-white hover:text-teal-300 transition duration-300 text-lg">Catalogue</a>
            <a href="" class="text-white hover:text-teal-300 transition duration-300 text-lg">Panier</a>
        </div>


        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                <div class="hidden sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-200 hover:text-teal-300 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-200 hover:text-teal-300 underline">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-200 hover:text-teal-300 underline">Inscription</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>


<div class="container mx-auto px-6 py-16 flex-grow">
    <h1 class="text-4xl font-semibold text-gray-900 mb-12 text-center">@yield('title')</h1>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @yield('content')
    </div>

    <div>
        @yield('view')
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6 mt-auto">
    <div class="container mx-auto text-center">
        <p class="text-sm">&copy; 2025 ClicknBuy. Tous droits réservés.</p>
    </div>
</footer>

<script>
    document.getElementById("userMenuButton").addEventListener("click", function (event) {
        event.stopPropagation();
        document.getElementById("userMenu").classList.toggle("hidden");
    });

    document.addEventListener("click", function (event) {
        let menu = document.getElementById("userMenu");
        let button = document.getElementById("userMenuButton");
        if (!button.contains(event.target) && !menu.contains(event.target)) {
            menu.classList.add("hidden");
        }
    });
</script>

</body>
</html>
