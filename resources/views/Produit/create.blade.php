@extends('layouts.app') 
    @section('content')
    
    <form action="{{ route('Produit.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nom" placeholder="Nom">
        <textarea name="description"></textarea>
        <input type="number" name="prix" placeholder="Prix">
        <input type="file" name="image_url" placeholder="Image URL">
        <input type="number" name="stock" placeholder="Stock">
        <select name="categorie_id">
            @foreach($categories as $categorie )
            <!-- options with category IDs -->
             <option value="{{$categorie->id}}">{{$categorie->nom}}</option>    
             @endforeach
        </select>
        <button type="submit">Ajouter Produit</button>
    </form>
    @endsection



