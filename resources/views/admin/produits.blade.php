
@extends('dashboard')
@section('content')

<div class="bg-white rounded-lg shadow overflow-hidden">
<button id="openModal" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Ajouter produit</button>
          <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold">Produits</h2>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th> -->
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">prix unitée</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($produits as $produit)
                <tr>
                  <!-- <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$produit->image}}</td> -->
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->titre}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->description}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->prixunite}}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$produit->stock}}</td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">{{$produit->souscategorie->title}}</span>
                  </td>
                  <td class="px-6 py-4 flex whitespace-nowrap text-sm text-gray-500">
                    <!-- <a href="#" class="text-blue-600 hover:text-blue-900">Voir</a> -->
                    <a href="/admin/updateform/{{$produit->id}}">
                        <button class="bg-[#3c3cd5] mr-3 text-white px-6 py-3 rounded-lg hover:bg-[#173b6a] focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 transform hover:scale-105">
                            Modifier
                        </button>
                    </a>

                    <form action="/admin/produits/destroy" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$produit->id}}" />

                        <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300 transform hover:scale-105">
                            Supprimer
                        </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="px-6 py-4 border-t border-gray-200">
            <a href="" class="text-blue-600 hover:text-blue-900">Voir toutes les produits →</a>
          </div>
        </div>




        <div id="jobModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50  justify-center items-center">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                <h2 class="text-xl font-bold mb-4">ajouter produit</h2>
                    <form action="/admin/produits/store" method="POST" class="w-full">
                      @csrf
                       <div class="form-element mb-4">
                          <label for="image" class="block text-gray-700 mb-2">Image</label>
                          <input type="url" name="image" required placeholder="image"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>


                        <div class="form-element mb-4">
                          <label for="titre" class="block text-gray-700 mb-2">Titre</label>
                          <input type="text" name="titre" required placeholder="Titre"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="description" class="block text-gray-700 mb-2">Description</label>
                          <input type="text" name="description" required placeholder="Description"   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="location" class="block text-gray-700 mb-2">prix d'unitée</label>
                          <input type="number" name="prixunite"  required placeholder="Emplacement" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                        </div>

                        <div class="form-element mb-4">
                          <label for="phone" class="block text-gray-700 mb-2">Stock</label>
                          <input type="number" name="stock" required placeholder="00000" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
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

    </div>



    <script>
        const modal = document.getElementById("jobModal");
        const openModal = document.getElementById("openModal");
        const closeModal = document.getElementById("closeModal");
        const projectsContainer = document.getElementById("projects");

        openModal.addEventListener("click", () => {
            modal.classList.remove("hidden");

        });

        closeModal.addEventListener("click", () => {
            modal.classList.add("hidden");

        });



    </script>


@endsection
