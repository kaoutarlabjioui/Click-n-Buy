@extends('welcome')
@section('title', 'Details Produit')
@section('view')


<div class="max-w-8xl bg-gray-50">
    <!-- Product Header - Refined with better spacing and shadows -->
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm mb-8 flex flex-col md:flex-row justify-between items-center border border-gray-100">
        <div class="md:pr-6">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 tracking-tight">
                {{ $produit->titre }}
            </h1>
            <div class="mt-4 space-y-2">
                <div class="flex items-center text-gray-700">
                    <i class="bi bi-tags-fill text-gray-500 mr-2"></i>
                    <span class="font-medium">{{ $produit->souscategorie->title }}</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <i class="bi bi-card-text text-gray-500 mr-2"></i>
                    <span>{{ $produit->souscategorie->categorie->title }}</span>
                </div>
            </div>

        </div>

        <div class="mt-6 md:mt-0">

          <img class="w-52 h-52 object-cover rounded-xl shadow-md border border-gray-300" src="{{ url('storage/'.$produit->image) }}" alt="Product Image">

        </div>
    </div>

    <!-- Product Details Section - Enhanced grid layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column - Product details with more elegant styling -->
        <div class="lg:col-span-2">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100">
                <h2 class="text-xl font-semibold mb-5 text-gray-800 flex items-center">
                    <i class="bi bi-info-circle text-gray-500 mr-2"></i> Details Produit
                </h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ $produit->description }}
                </p>
                <div class="mt-6 flex items-center">
                    <i class="bi bi-box-seam text-emerald-600 mr-2"></i>
                    <span class="text-gray-700">Stock: </span>
                    <span class="text-emerald-600 font-medium ml-1">{{ $produit->stock }}</span>
                </div>
            </div>
        </div>


        <div class="lg:col-span-1">
            <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 sticky top-8">
                <div  class="text-3xl font-bold text-gray-900 mb-6 flex items-center">
                    <i class="bi bi-cash-coin mr-2 text-gray-700"></i> <span id="prix">{{ $produit->prixunite }}</span>
                </div>


                <div class="mb-6">
                    <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Quantitée:</label>
                    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden w-36">
                        <button id="decrease" class="bg-gray-50 px-3 py-2 text-gray-600 font-medium hover:bg-gray-100 transition-colors">-</button>
                        <input type="text" id="quantite" value="1" disabled class="w-full text-center text-gray-800 font-medium bg-white border-none focus:outline-none py-2">
                        <input type="hidden" id="produit" value="{{ $produit->id }}">
                        <button id="increase" class="bg-gray-50 px-3 py-2 text-gray-600 font-medium hover:bg-gray-100 transition-colors">+</button>
                    </div>
                </div>


                <button id="BuyBtn" class="w-full bg-black text-white py-3 rounded-lg font-medium transition-all duration-200 hover:bg-gray-800 active:transform active:scale-[0.98] flex items-center justify-center">
                    <i class="bi bi-cart-fill mr-2"></i>
                    <span id="buyText">Ajouter au Panier</span>
                    <span id="spinner" class="ml-2 hidden">
                        <i class="bi bi-arrow-repeat animate-spin"></i>
                    </span>
                </button>


                <div class="mt-8 space-y-4 text-gray-600">
                    <div class="flex items-center">
                        <i class="bi bi-truck text-gray-500 text-lg w-8"></i>
                        <span class="text-sm">Fast Delivery Available</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-credit-card text-gray-500 text-lg w-8"></i>
                        <span class="text-sm">Secure Payments</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-award text-gray-500 text-lg w-8"></i>
                        <span class="text-sm">30 Days Warranty</span>
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-shield-lock text-gray-500 text-lg w-8"></i>
                        <span class="text-sm">100% Buyer Protection</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


    const quantite=document.getElementById('quantite');
    document.getElementById('increase').addEventListener('click',()=>{
        let value= parseInt(quantite.value);
        if(value < {{ $produit->stock }}) {
            quantite.value = value + 1;
            console.log({{ $produit->prix }} );
            document.getElementById('prix').textContent = {{ $produit->prixunite }} *  quantite.value;

        }
    });

    document.getElementById('decrease').addEventListener('click', ()=> {
        let value = parseInt(quantite.value);
        if (value > 1) {
            lastqt = document.getElementById('quantite').value;
            lastprix=document.getElementById('prix').textContent;
            quantite.value = value - 1;
            newquantite=document.getElementById('quantite').value;

            console.log(lastqt,lastprix,newquantite);
            document.getElementById('prix').textContent=(newquantite * lastprix)/lastqt;
        }
    });



// ajout au panier
    document.getElementById("BuyBtn").addEventListener("click",()=>{
        let quantite = parseInt(document.getElementById('quantite').value);
        let prix = {{$produit->prixunite}};
        let produit = document.getElementById("produit").value;

        let panier= localStorage.getItem('panier') ? JSON.parse(localStorage.getItem('panier')) : [];

        let produitExiste = panier.find(item=>item.produit === produit);
        if(produitExiste){
            produitExiste.quantite = quantite;
        }else{
            panier.push({produit: produit,quantite: quantite , prix: prix});
        }
        //   console.log(prix);

        localStorage.setItem('panier',JSON.stringify(panier));

              console.log(panier);
    });








</script>
@endsection
