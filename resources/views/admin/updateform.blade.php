<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">ajouter produit</h2>
                    <form action="/admin/produits/update" method="POST" class="w-full"  enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" value="{{$produit->id}}" />
                       <div class="form-element mb-4">
                          <label for="image" class="block text-gray-700 mb-2">Image</label>
                          <input type="file" name="image" required placeholder="image" value="{{$produit->image}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>


                        <div class="form-element mb-4">
                          <label for="titre" class="block text-gray-700 mb-2">Titre</label>
                          <input type="text" name="titre" required placeholder="Titre" value="{{$produit->titre}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="description" class="block text-gray-700 mb-2">Description</label>
                          <input type="text" name="description" required placeholder="Description"  value="{{$produit->description}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="location" class="block text-gray-700 mb-2">prix d'unitée</label>
                          <input type="number" name="prixunite"  required placeholder="Emplacement" value="{{$produit->prixunite}}"class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="phone" class="block text-gray-700 mb-2">Stock</label>
                          <input type="number" name="stock" required placeholder="00000" value="{{$produit->stock}}"class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                            <label for="souscategorie_id" class="block text-gray-700 mb-2">Sous-catégorie</label>
                            <select name="souscategorie_id" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="" disabled selected>Sélectionner une sous-catégorie</option>
                                @foreach ($souscategories as $souscategorie)
                                    <option value="{{ $souscategorie->id }}">{{ $souscategorie->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- <div class="form-element mb-4">
                          <label for="phone" class="block text-gray-700 mb-2">categorie</label>
                          <input type="text" name="categorie_id" required placeholder="00000" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div> -->

                        <div class="flex justify-end space-x-2">
                        <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">Annuler</button>
                        <input type="submit" name="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" value="Publier">
                    </div>
                </form>
            </div>
</body>
</html>
