@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Liste des Catégories</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            @if($categories->count())
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>
                                    <a href="{{ route('Categorie.show', $categorie->id) }}" class="btn btn-info btn-sm">Voir</a>
                                    <a href="{{ route('Categorie.edit', $categorie->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                    <form action="{{ route('Categorie.destroy', $categorie->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            @else
                <p>Aucune catégorie trouvée.</p>
            @endif
            <div class="d-flex justify-content-center">
        {{ $categories->links() }}
    </div>
        </div>
    </div>
</div>
@endsection
