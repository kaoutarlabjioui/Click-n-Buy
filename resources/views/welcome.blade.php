<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClicknBuy - Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

</head>

<body class="bg-gray-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-pink-600 text-white shadow-lg py-4">
        <div class="container mx-auto flex justify-between items-center px-6 md:px-8">
            <a href="" class="text-3xl font-semibold text-gray-300 hover:text-gray-400 transition duration-300">ClicknBuy</a>
            <div class="flex space-x-6">
                <a href="/produits" class="text-white hover:text-gray-300 transition duration-300 text-lg">Catalogue</a>
                <a href="/panier" id="cartButton" class="text-white hover:text-gray-300 transition duration-300 text-lg flex items-center space-x-2">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18l-1.5 9h-15L3 3zm0 0l1.5 9h15l1.5-9m-7.5 12a3 3 0 1 0-3 3 3 3 0 0 0 3-3zM6 21h12" />
                    </svg>
                    <span>Panier</span>
                </a>
            </div>
            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                <div class="hidden sm:block">
                    @auth
                    @if(auth()->user()->role->role_name == 'admin')
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-200 hover:text-gray-300 underline">Dashboard</a>
                    @else
                    <div class="flex space-x-6">
                        <a href="/produits" class="text-white hover:text-gray-300 transition duration-300 text-lg">Catalogue</a>
                        <a href="/panier" id="cartButton" class="text-white hover:text-gray-300 transition duration-300 text-lg">Panier</a>
                    </div>
                    @endif
                    <a href="/logout" class="text-sm text-gray-200 hover:text-gray-300 underline">{{ __('Log Out') }}</a>
                    @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-200 hover:text-gray-300 underline">Connexion</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-200 hover:text-gray-300 underline">Inscription</a>
                    @endif
                    @endauth
                </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Cart Sidebar -->
    <div id="cart" class="fixed inset-0 overflow-hidden z-10 hidden transition-all ease-in-out" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
                    <div class="pointer-events-auto w-screen max-w-md">
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl rounded-lg">
                            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Panier</h2>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" id="closeCart" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                                            <span class="absolute -inset-0.5"></span>
                                            <span class="sr-only">Fermer</span>
                                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="flow-root">
                                        <ul role="list" id="items" class="-my-6 divide-y divide-gray-200">
                                            <!-- Items will be populated here -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900">
                                    <p>Total à payer</p>
                                    <div class="flex">
                                        <span>$</span>
                                        <span id="totalAmount">0</span>
                                    </div>
                                </div>
                                <div class="mt-6">
                                    <form action="/commandes/page" method="POST">
                                        @csrf
                                        <input type="hidden" name="data" id="data">
                                        <input type="hidden" name="balance" id="total">
                                        <button type="submit" class="block rounded-md border border-transparent bg-pink-600 px-6 py-3 text-base font-medium text-white shadow-xs hover:bg-pink-700 transition-all">Checkout</button>
                                    </form>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                                    <p>
                                        ou
                                        <button type="button" class="font-medium text-pink-500 hover:text-pink-700 hover:bg-pink-600 transition-all">
                                            Continuez votre Shopping
                                            <span aria-hidden="true"> &rarr;</span>
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        document.getElementById("cartButton").addEventListener("click", function(event) {
            document.getElementById('data').value = localStorage.getItem('panier');
            event.preventDefault();
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            let cart = document.getElementById("cart");
            cart.classList.toggle("hidden");

            itemsSection = document.getElementById('items');
            items = JSON.parse(localStorage.getItem('panier'));

            fetch('/produits/placeorder', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(items)
            })
            .then(response => response.json())
            .then(data => {
                itemsSection.innerHTML = '';
                let Total = 0;
                for (let i = 0; i < data.produits.length; i++) {
                    itemsSection.innerHTML += `<li class="flex py-6">
                        <div class="ml-4 flex flex-1 flex-col">
                            <div class="flex justify-between text-base font-medium text-gray-900">
                                <h3><a href="#">${data.produits[i].titre}</a></h3>
                                <p class="ml-4">$${data.produits[i].prixunite} x${data.produits[i].quantite}</p>
                            </div>
                            <div class="flex flex-1 items-end justify-between text-sm">
                                <p class="text-gray-500">${data.produits[i].quantite}</p>
                                <div class="flex">
                                    <button type="button" data-id="${data.produits[i].id}" class="font-medium text-indigo-600 hover:text-indigo-500 removeTag">Supprimer</button>
                                </div>
                            </div>
                        </div>
                    </li>`;
                    Total += data.produits[i].prixunite * data.produits[i].quantite || 0;
                }
                totalSpan = document.getElementById('totalAmount');
                totalSpan.textContent = Total;
                document.getElementById('total').value = Total;
            })
            .catch(error => console.error('Error fetching data:', error));
        });

        document.getElementById("closeCart").addEventListener("click", function() {
            document.getElementById("cart").classList.add("hidden");
        });

        document.addEventListener("click", function(event) {
            let cart = document.getElementById("cart");
            let cartButton = document.getElementById("cartButton");
            if (!cartButton.contains(event.target) && !cart.contains(event.target)) {
                cart.classList.add("hidden");
            }
        });
    </script>

</body>

</html>
