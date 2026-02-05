@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Détails du categorie</h3>

    <p><strong>Nom:</strong> {{ $categorie->nom }}</p>

    <a href="{{ route('Categorie.index') }}" class="btn btn-secondary">Retour</a>
    <a href="{{ route('Categorie.edit', $categorie->id) }}" class="btn btn-primary">Modifier</a>
</div>
@endsection
