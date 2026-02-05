<?php

namespace App\Http\Controllers;

// use Illuminate\Container\Attributes\DB;

use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
// use SebastianBergmann\FileIterator\Facade;
use App\Models\produit;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        if ($request->has('search')) {
            # code...
            // echo $request->search,$request->category,$request->min_price,$request->max_price,$request->sort;
            $query = produit::query();
            
            // Recherche par mot-clé 
            $query->where('nom', 'like', '%'.$request->input('search').'%'); 
            // dd($query->get());
            
            // Filtrer par catégorie 
            if ($request->has('category') && $request->get('category')) { 
                $query->where('categorie_id', $request->input('category')); 
            } 
            // Filtrer par prix minimum et maximum 
            if ($request->has('min_price') && $request->get('min_price')) { 
                $query->where('price', '>=',(float)  $request->input('min_price')); 
            } 
            if ($request->has('max_price') && $request->get('max_price')) { 
                $query->where('price', '<=',(float) $request->input('max_price')); 
            } 
            // Trier par date 
            if ($request->has('sort')) { 
                // dd($request);
                $query->orderBy('created_at', $request->input('sort')=='newest'?'asc':'desc'); 
                // asc ou desc 
            } 
            $items = $query->get();
            // dd($items);
            // if ($items->count()!=0) {
            //     # code...
            //     echo $items->count();
            //     }else{
            //     echo 'aucun record';
            // }
            return view('finalProduit.index',['produits'=>$items,'categories'=>categorie::all()]);
        }
        return view('finalProduit.index',['produits'=>produit::all(),'categories'=>categorie::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('finalProduit.create',['categories'=>categorie::all()]);
    }
        
        /**
         * Store a newly created resource in storage.
        */
        public function store(Request $request)
        {
            //
            $path = $request->file('image_url')->store('images', 'public');
            Produit::create([
                'nom'=> $request->nom,
                'description'=>$request->description,
                'prix'=>$request->prix,
                'image_url'=>$path,
                'stock'=>$request->stock,
                'categorie_id'=>$request->categorie_id
            ]);
            return redirect()->route('Produit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('finalProduit.show',['produit'=>produit::find($id),'categories'=>categorie::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        return view('finalProduit.edit',['produit'=>produit::find($id),'categories'=>categorie::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $produit = Produit::findOrFail($id); 
        // Update fields directly from request 
        // dd($request->all(), $request->file('image_url'));

        if ($request->hasFile('image_url')) { 
            // dd($request->file('image_url'));
            $path = $request->file('image_url')->store('images', 'public'); 
            $produit->image_url = $path; 
        }
        // $path = $request->file('image_url')->store('images', 'public');
        $produit->nom = $request->nom; 
        $produit->description = $request->description; 
        $produit->prix = $request->prix; 
        // $produit->image_url =$path; 
        $produit->stock = $request->stock; 
        $produit->categorie_id = $request->categorie_id; 
        // $produit->fill();
        // Save changes 
        $produit->save(); 
        // Redirect back to index 
        return redirect()->route('finalProduit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        produit::destroy($id);
        return redirect()->route('Produit.index');
    }
}
