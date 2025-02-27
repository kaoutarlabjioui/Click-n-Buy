<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::get();
        return view('home.categorie',compact('categories'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ]);

        Categorie::create([
            'title'=>$request->title,
            'description'=>$request->description
        ]);

        return back();

    }

    public function update(Request $request)
    {
        $categorie=Categorie::find($request->id);
        $categorie->update($request->all());
        // return $this->showCategorie();
        return redirect('/admin/categories/showCategorie');
    }


    public function updateForm(Request $request)
    {

        $categorie = Categorie::find($request->id);


        return view('admin.updatecat',compact('categorie'));
    }

    public function destroy(Request $request)
    {


        if($request->id)
        {
            $categorie = Categorie::find($request->id);

            $categorie->delete();
        }

        return back();
    }

    public function showCategorie()
    {

        $categories=Categorie::all();

        return view('admin.categories',compact('categories'));

    }



}
