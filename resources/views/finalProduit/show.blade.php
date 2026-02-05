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
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('Produit.index') }}" class="flex items-center gap-2 text-emerald-700 hover:text-emerald-900 font-semibold transition">
                <i class="fa-solid fa-chevron-left"></i>
                Retour au catalogue
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-xl shadow-emerald-900/5 border border-emerald-100 overflow-hidden">
            <div class="flex flex-col md:flex-row">
                
                <div class="md:w-1/2 bg-emerald-50 h-80 md:h-auto relative">
                    <img src="{{ asset('storage/' . $produit->image_url) }}" 
                         alt="{{ $produit->nom }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute top-4 right-4">
                        <span class="bg-white/90 backdrop-blur px-4 py-2 rounded-2xl text-emerald-700 font-bold shadow-sm">
                            {{ $produit->prix }} €
                        </span>
                    </div>
                </div>

                <div class="md:w-1/2 p-8 lg:p-12 flex flex-col">
                    <div class="mb-6">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-500 mb-2 block">
                            {{ $produit->categorie->nom }}
                        </span>
                        <h1 class="text-3xl font-bold text-slate-800 mb-4">{{ $produit->nom }}</h1>
                        <p class="text-slate-600 leading-relaxed">
                            {{ $produit->description ?? 'Aucune description fournie pour cette plante.' }}
                        </p>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="bg-emerald-50 p-4 rounded-2xl">
                            <span class="block text-xs text-emerald-600 font-semibold uppercase">Stock</span>
                            <span class="text-xl font-bold text-emerald-900">{{ $produit->stock }} unités</span>
                        </div>
                        <div class="bg-emerald-50 p-4 rounded-2xl">
                            <span class="block text-xs text-emerald-600 font-semibold uppercase">ID Produit</span>
                            <span class="text-xl font-bold text-emerald-900">#{{ $produit->id }}</span>
                        </div>
                    </div>

                    <div class="mt-auto flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('Produit.edit', $produit->id) }}" 
                           class="flex-1 inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-emerald-100">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Modifier
                        </a>

                        <form action="{{ route('Produit.destroy', $produit->id) }}" method="POST" class="flex-1" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette plante ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center gap-2 bg-rose-50 hover:bg-rose-100 text-rose-600 font-bold py-4 rounded-2xl transition-all">
                                <i class="fa-solid fa-trash-can"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>