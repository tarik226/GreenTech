@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h4>Détails du Produit</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $produit->nom }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $produit->description }}</p>
            <p class="card-text"><strong>Prix:</strong> {{ $produit->prix }} MAD</p>
            <p class="card-text"><strong>Stock:</strong> {{ $produit->stock }}</p>
            <p class="card-text"><strong>Catégorie:</strong> {{ $produit->categorie_id }}</p>
            
            @if($produit->image_url)
                <div class="mb-3">
                    <img src="{{ $produit->image_url }}" alt="{{ $produit->nom }}" class="img-fluid rounded">
                </div>
            @endif

            <a href="{{ route('Produit.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('Produit.edit', $produit->id) }}" class="btn btn-primary">Modifier</a>
            <form action="{{ route('Produit.destroy', $produit->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection
