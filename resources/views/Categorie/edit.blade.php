@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Modifier le Produit</h3>

    <form action="{{ route('Categorie.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" 
                   value="{{ old('nom', $categorie->nom) }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
