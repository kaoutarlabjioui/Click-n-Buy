<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class SousCategorieController extends Controller
{
    public function index()
    {
        $souscategories =SousCategorie::get();
        return view('home.souscategorie',compact('souscategories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        SousCategorie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'categorie_id' => $request->categorie_id,
        ]);

        return back();

    }

    public function update(Request $request)
    {
     
        $souscategories=SousCategorie::find($request->id);
        $souscategories->update($request->all());
        // return $this->showCategorie();
        return redirect('/admin/souscategories/showsouscategorie');
    }


    public function updateForm(Request $request)
    {

        $souscategorie = SousCategorie::find($request->id);


        return view('admin.updatesouscat',compact('souscategorie'));
    }

    public function destroy(Request $request)
    {


        if($request->id)
        {
            $souscategorie= SousCategorie::find($request->id);

            $souscategorie->delete();
        }

        return back();
    }

    public function showSouscategorie()
    {
        $categories=Categorie::all();
        $souscategories=SousCategorie::all();

        return view('admin.souscategories',compact('souscategories','categories'));

    }

}
