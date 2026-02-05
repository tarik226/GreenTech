<?php

namespace App\Http\Controllers;

use App\Models\Favorie;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class FavorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(User::find(Auth::id())->produits);
        return view('Favorie.index',['favories'=>User::find(Auth::id())->produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(int $id)
    {
        //
        Favorie::create([
            'user_id' => Auth::id(),
            'produit_id' => $id
        ]);
        $produit = Produit::find($id); 
        if ($produit) { 
            $produit->is_favorite = 1; 
            $produit->save(); 
            // persist the change
        }
        return to_route('Favorie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::find(Auth::id())->produits()->where('id', $id)->detach();
        $produit=produit::find($id);
        $produit->is_favorite=0;
        $produit->save();
        return to_route('Favorie.index');
    }
}
