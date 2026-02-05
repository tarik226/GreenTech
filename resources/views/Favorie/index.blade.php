<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Document</title>
</head>
<body>
    

<div class="min-h-screen bg-slate-50 py-12 px-4">
    <div class="max-w-7xl mx-auto">
        
        <div class="mb-10 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-emerald-950 flex items-center gap-3">
                    <i class="fa-solid fa-heart text-pink-500"></i>
                    Mes Favoris
                </h1>
                <p class="text-emerald-600/80 mt-2">Retrouvez ici toutes les plantes que vous avez coup de cœur.</p>
            </div>
            <a href="{{ route('Produit.index') }}" class="text-sm font-bold text-emerald-700 hover:text-emerald-900 flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i>
                Retour au shop
            </a>
        </div>

        @if($favories->isEmpty())
            <div class="bg-white rounded-3xl border border-emerald-100 p-20 text-center shadow-sm">
                <div class="w-20 h-20 bg-emerald-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-heart-crack text-emerald-200 text-3xl"></i>
                </div>
                <h2 class="text-xl font-bold text-slate-800 mb-2">Aucun favori pour le moment</h2>
                <p class="text-slate-500 mb-8">Parcourez notre catalogue et cliquez sur le cœur pour ajouter des plantes.</p>
                <a href="{{ route('Produit.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-emerald-200">
                    Découvrir nos plantes
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($favories as $produit)
                <article class="bg-white group rounded-3xl border border-emerald-50 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    <div class="h-56 bg-emerald-100 rounded-t-3xl relative overflow-hidden">
                        <div class="absolute inset-0 group-hover:scale-110 transition duration-500">
                            <img class="w-full h-full object-cover" src="{{ asset('storage/' . $produit->image_url) }}" alt="{{$produit->nom}}">
                        </div>
                        <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-emerald-700 px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                            {{$produit->categorie->nom}}
                        </span>
                    </div>

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-2">
                            <h3 class="text-xl font-bold text-slate-800">{{$produit->nom}}</h3>
                            <span class="text-lg font-bold text-emerald-600">{{Number::currency($produit->prix, 'MAD')}}</span>
                        </div>
                        
                        <div class="flex items-center justify-between pt-6 mt-4 border-t border-slate-50">
                            <a href="{{route('Produit.show', $produit->id)}}" class="flex items-center gap-2 text-blue-600 font-bold text-sm hover:underline">
                                <i class="fa-solid fa-eye"></i>
                                Voir les détails
                            </a>

                            <form action="{{ route('Favorie.destroy', $produit->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="flex items-center gap-2 bg-rose-50 text-rose-600 px-4 py-2 rounded-xl hover:bg-rose-600 hover:text-white transition-all font-bold text-xs"
                                    title="Retirer des favoris">
                                    <i class="fa-solid fa-heart-crack"></i>
                                    Retirer
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        @endif

    </div>
</div>
</body>
</html>