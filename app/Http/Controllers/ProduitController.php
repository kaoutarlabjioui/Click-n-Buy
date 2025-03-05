<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            'image' => 'required|file|mimes:jpg,png|max:2048',

        ]);
        // dd($request->image);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName='produit_'.time(). '.' .$extension;
        $path =$request->file('image')->storeAs('uploads',$fileName,'public');
        // dd($path);

              Produit::create(['image'=>$path,
                        'titre'=>$request->titre,
                        'description'=>$request->description,
                        'prixunite'=>$request->prixunite,
                        'stock'=>$request->stock,
                        'souscategorie_id'=>$request->souscategorie_id]);

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
        // $produit->update($request->all());jfhhgfkgjg hgugio j kgh ghok
        $request->validate([
            'image' => 'required|file|mimes:jpg,png|max:2048',

        ]);
        // dd($request->image);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName='produit_'.time(). '.' .$extension;
        $path =$request->file('image')->storeAs('uploads',$fileName,'public');
        // dd($path);

              $produit->update(['image'=>$path,
                        'titre'=>$request->titre,
                        'description'=>$request->description,
                        'prixunite'=>$request->prixunite,
                        'stock'=>$request->stock,
                        'souscategorie_id'=>$request->souscategorie_id]);
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


    public function getOne(Request $request)
    {


        $produit  = Produit::find($request['produit']);

        if($produit->user->id != Auth::user()->id)
        {
            return view('admin.produits')->with('failed', 'You are not authorized to access this product');
        }

        $souscategories = SousCategorie::all();
        return view('admin.updateform', compact('produit', 'souscategories'));
    }

    // public function placeOrder(Request $request){
    //     $produit = Produit::find(session('produit'));
    //     return response()->json(['produit' => session()->get('produit'), 'quantite' => session()->get('quantite')]);
    // }



    public function placeOrder(Request $request)
    {
        $produits = $request->json()->all();
        //  $produitSession = session()->put("produit",  $produits);
        if (!$produits || !is_array($produits)) {
            return response()->json(['error' => 'Invalid data received'], 400);
        }

        Log::info('Received request data:', $produits);

        $array = [];
        $i = 0;
        foreach ($produits as $produit) {
            $prod = Produit::find($produit['produit']);


            if ($prod) {
                $array[$i] = [
                    'id' => $prod->id,
                    'titre' => $prod->titre,
                    'prixunite' => $prod->prixunite,
                    'image' => $prod->image,
                    'description' => $prod->description,
                    'quantite' => $produit['quantite'] ?? 1
                ];
                $i++;
            }
        }

        return response()->json(['produits' => $array], 200);
    }


}
