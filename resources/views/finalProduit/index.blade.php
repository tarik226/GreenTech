<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantly - Gestion de Plantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-slate-50 text-slate-900 font-sans">

    <header class="bg-white border-b border-emerald-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center space-x-8">
                <span class="text-2xl font-bold text-emerald-700 tracking-tight">Plantly</span>
                <nav class="hidden md:flex space-x-6 text-sm font-semibold text-emerald-900/70">
                    <a href="{{ route('Produit.index') }}" class="hover:text-emerald-600 transition">Produits</a>
                    <a href="{{ route('Categorie.index') }}" class="hover:text-emerald-600 transition">Catégories</a>
                    @if(Auth::check() && Auth::user()->role == 'client')
                    <a href="{{ route('Favorie.index') }}" class="hover:text-emerald-600 transition">Favories</a>
                    @endif
                </nav>
            </div>
            @guest
            <div class="flex items-center space-x-4">
                <a href="/login" class="text-sm font-bold text-emerald-800 px-4 py-2 hover:bg-emerald-50 rounded-lg">Sign In</a>
                <a href="/register" class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-bold px-5 py-2.5 rounded-xl shadow-md transition">Sign Up</a>
            </div>
            @endguest
            @auth 
                <a href="{{route('logout')}}" class="text-sm font-bold text-emerald-800 px-4 py-2 hover:bg-emerald-50 rounded-lg">Log out</a>
            @endauth
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <section class="bg-white p-6 rounded-2xl border border-emerald-100 shadow-sm mb-10">
            <form action="{{ route('Produit.index') }}" method="GET" class="flex flex-col lg:flex-row gap-4">
                <div class="relative flex-1">
                    <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-emerald-400"></i>
                    <input type="text" name="search" placeholder="Rechercher par nom..." 
                        class="w-full pl-11 pr-4 py-3 bg-emerald-50/50 border border-emerald-100 rounded-xl focus:ring-2 focus:ring-emerald-500 outline-none transition">
                </div>
                
                <div class="flex flex-wrap items-center gap-3">
                    <select name="category" class="bg-white border border-emerald-100 text-emerald-900 text-sm rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
                        <option value="">Toutes les catégories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nom }}</option>
                        @endforeach 
                    </select>
                    
                    <div class="flex items-center bg-emerald-50/50 border border-emerald-100 rounded-xl px-2">
                        <input type="number" name="min_price" placeholder="Min" class="w-16 bg-transparent p-2 text-sm outline-none">
                        <span class="text-emerald-300 mx-1">|</span>
                        <input type="number" name="max_price" placeholder="Max" class="w-16 bg-transparent p-2 text-sm outline-none">
                    </div>

                    <select name="sort" class="bg-white border border-emerald-100 text-emerald-900 text-sm rounded-xl px-4 py-3 outline-none focus:border-emerald-500">
                        <option value="desc">Plus récent</option>
                        <option value="asc">Prix croissant</option>
                    </select>
                </div>
                <button type="submit" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-bold transition">Rechercher</button>
            </form>
        </section>

        <div class="flex items-center justify-between mb-8">
            <h2 class="text-2xl font-bold text-emerald-900">Catalogue des Plantes</h2>
            @if(Auth::check() && Auth::user()->role != 'client')
            <a href="{{ route('Produit.create') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-bold transition">
                <i class="fa-solid fa-plus"></i>
                <span class="hidden sm:inline">Ajouter une plante</span>
            </a>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Blade Loop --}}
            @foreach($produits as $produit)
            <article class="bg-white group rounded-3xl border border-emerald-50 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                <div class="h-56 bg-emerald-100 rounded-t-3xl relative overflow-hidden">
                    <div class="absolute inset-0  group-hover:scale-110 transition duration-500">
                        <!-- <i class="fa-solid fa-leaf text-6xl text-emerald-400"></i> -->
                        <img class="w-full h-full object-cover" src="{{ asset('storage/' . $produit->image_url) }}" alt="{{$produit->nom}}" >
                    </div>
                    <span class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-emerald-700 px-3 py-1 rounded-full text-xs font-bold shadow-sm">
                        {{$produit->categorie->nom}}
                    </span>
                </div>

                <div class="p-6">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-xl font-bold text-slate-800">{{$produit->nom}} </h3>
                        <span class="text-lg font-bold text-emerald-600">{{Number::currency($produit->prix, 'MAD')}}</span>
                    </div>
                    <p class="text-slate-500 text-sm mb-6 leading-relaxed line-clamp-2">Left in stock {{$produit->stock}}</p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                        <div class="flex items-center align-first gap-2 ">
                            <a href="{{route('Produit.show',$produit->id)}}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition shadow-sm" title="Détails">
                                <i class="fa-solid fa-eye text-sm"></i>
                            </a>
                            @if(Auth::check() && Auth::user()->role == 'client')
                                @if(isset($produit->is_favorite) && $produit->is_favorite == 1)
                                <form action="{{ route('Favorie.destroy', $produit->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition shadow-sm" title="Retirer des favoris">
                                    <i class="fa-solid fa-heart-crack text-sm"></i>
                                </button>

                                @else
                                <form action="{{ route('ffavorie.store', $produit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-pink-50 text-pink-500 hover:bg-pink-500 hover:text-white transition shadow-sm" title="Ajouter aux favoris">
                                        <i class="fa-solid fa-heart text-sm"></i>
                                    </button>
                                </form>
                                @endif
                            @endif
                        </div>
                        @if(Auth::check() && Auth::user()->role == 'admin')
                        <div class="flex gap-2">
                            <a href="{{route('Produit.edit',$produit->id)}}" class="w-10 h-10 flex items-center justify-center rounded-xl bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white transition shadow-sm" title="Modifier">
                                <i class="fa-solid fa-pen-to-square text-sm"></i>
                            </a>
                            <form action="{{route('Produit.destroy',$produit->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-10 h-10 flex items-center justify-center rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-600 hover:text-white transition shadow-sm" title="Supprimer">
                                    <i class="fa-solid fa-trash text-sm"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </main>

</body>
</html>