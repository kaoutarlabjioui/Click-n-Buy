@extends('welcome')
@section('title','Catalogue')
@section('content')
@foreach ($produits as $produit)
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition-all duration-300 hover:shadow-md">
    <div class="px-5 pt-4 pb-5">
    <img src="{{ url('storage/'. $produit->image) }}" alt="{{ $produit->title }}" class="w-full h-48 object-cover rounded-md mb-4">
        <!-- <h2 class="text-lg font-medium text-gray-800 tracking-tight">{{ $produit->titre }}</h2> -->
        <p class="mt-2 text-sm text-gray-500 leading-relaxed">{{$produit->description }}</p>
        <p class="mt-3 text-lg font-medium text-gray-900">{{ $produit->prixunite }} €</p>
        <div class="mt-4 grid grid-cols-2 gap-3">
            <form action="/produits/details" method="POST">
                @csrf
                <input type="hidden" name="produit" value="{{ $produit->id }}">
                <button type="submit" class="w-full bg-gray-50 text-gray-800 border border-gray-200 py-2 px-4 rounded-lg text-sm font-medium hover:bg-gray-100 transition-colors duration-200">Voir details</button>
            </form>

            <form action="" method="POST">
                @csrf
                <input type="hidden" name="produit" value="{{ $produit->id }}">
                <button type="submit" class="w-full bg-black text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-gray-900 transition-colors duration-200">Ajouter au Panier</button>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
