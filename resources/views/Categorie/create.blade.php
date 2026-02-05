@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Créer un Produit</h3>

    <form action="{{ route('Categorie.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Nom du produit">
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
