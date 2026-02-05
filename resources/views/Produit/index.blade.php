@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Liste des Produits</h1>

    <!-- Add Product Button -->
     
    <a href="{{route('Produit.create')}}" class="btn btn-success mb-3">Ajouter Produit</a>

    <!-- Products Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produits as $produit)
                <tr>
                    <td>{{ $produit->nom }}</td>
                    <td>{{ $produit->description }}</td>
                    <td>{{ $produit->prix }}</td>
                    <td>{{ $produit->stock }}</td>
                    <td>
     
                        <img src="" alt="{{ $produit->nom}}" width="80">
                    </td>
                    <td>
                        <!-- Show -->
     
                        <a href="{{route('Produit.show',$produit->id)}}" class="btn btn-info btn-sm">Voir</a>

                        <!-- Delete -->
     
                        <form action="{{route('Produit.destroy',$produit->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- <div class="d-flex justify-content-center">
        {{ $produits->links() }}
    </div> -->
</div>
@endsection
