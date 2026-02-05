<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\produit;
use Illuminate\Http\Request;

class CategorieController
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        //
        $categories=categorie::all();
        // $count = produit::count();
        // $count=produit::selectRaw('select count(*) from produit join categorie on categorie.id=produit.categorie_id ');
        return view('finalCategorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Produit.create');
    }
        
        /**
         * Store a newly created resource in storage.
        */
        public function store(Request $request)
        {
            //
            categorie::create([
                'nom'=> $request->nom,
                'parent_id'=>$request->parent_id
            ]);
            return redirect()->route('Categorie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('Categorie.details',['categorie'=>categorie::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        return view('Categorie.edit',['categorie'=>categorie::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $categorie = categorie::findOrFail($id); 
        // Update fields directly from request 
        $categorie->nom = $request->nom; 
        // $categorie->fill();
        // Save changes 
        $categorie->save(); 
        // Redirect back to index 
        return redirect()->route('Categorie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        categorie::destroy($id);
        return redirect()->route('Categorie.index');
    }
}
