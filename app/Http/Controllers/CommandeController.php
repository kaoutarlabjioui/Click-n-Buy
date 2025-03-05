<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\CommandeItems;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommandeController extends Controller
{
    // public function index(){
    //     return view('client.commande');
    // }

    public function commande(Request $request){

        $produits =json_decode($request['data']);
        $totalPrix =intval($request['balance']);
        // dd($produits);

        $commande = Commande::create([
            'client_id'=> Auth::user()->id,
            'prix_totale'=> $totalPrix,

        ] );


        foreach($produits as $produit){

            $product= Produit::find(intval($produit->produit));

            CommandeItems::create([
                'produit_id'=>$product->id,
                'commande_id'=>$commande->id,
                'prix'=> intval($produit->prixunite * $produit->quantite),
                'quantite' =>$produit->quantite,
            ]);
        }


        $produits = CommandeItems::where('commande_id',$commande->id)->get();
        return view('client.commande',compact('produits','commande','totalPrix'));




        // dd($request);
        // $sessionProduct = session()->get('produit');

        // dd($sessionProduct);
        // // $produits = $request->json()->all();




    }




}
