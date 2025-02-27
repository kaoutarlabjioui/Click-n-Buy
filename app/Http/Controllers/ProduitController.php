<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::get();
        $souscategories = SousCategorie::get();
        return view('client.produit', compact('produits','souscategories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required',
            'titre' => 'required',
            'description' => 'required',
            'prixunite' => 'required',
            'stock' => 'required',
            'souscategorie_id' => 'required '
        ]);
            // dd($request);
              Produit::create(['image'=>$request->image,
                        'titre'=>$request->titre,
                        'description'=>$request->description,
                        'prixunite'=>$request->prixunite,
                        'stock'=>$request->stock,
                        'souscategorie_id'=>$request->souscategorie_id]);
            // dd($produit);
        return back();
    }


    public function showProduit()
    {
        $produits = Produit::all();
        $souscategories = SousCategorie::all();
        // dd($souscategories);
        return view('admin.produits', compact('produits','souscategories'));
    }


    public function destroy(Request $request){

        if($request->id)
        {
           $produit =  Produit::find($request->id);
           $produit->delete();
        }

        return back();
    }

    public function update(Request $request)
    {
        $produit = Produit::find($request->id);
        $produit->update($request->all());
        // return $this->showProduit();
        return redirect('/admin/produits/showproduits');
    }


    public function updateForm(Request $request)
    {
        $souscategories=SousCategorie::all();
        $produit = Produit::find($request->id);


        return view('admin.updateform',compact('produit','souscategories'));
    }

    public function detailsProduits(Request $request)
    {
        $produit = Produit::find($request->produit);

        return view('client.detailsproduit',compact('produit'));
    }

    public function ajouter(Request $request)
    {
        session(['produit'=>$request->produit,'quantite'=>$request->quantite]);
        return response()->json(['produit'=>$request->produit,'quantite'=>$request->quantite]);
    }

}
