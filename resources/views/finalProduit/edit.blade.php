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
    <div class="max-w-5xl mx-auto">
        
        <form action="{{ route('Produit.update', $produit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-3xl shadow-xl border border-emerald-100 overflow-hidden">
                <div class="flex flex-col lg:flex-row">
                    
                    <div class="lg:w-2/5 bg-emerald-50/50 p-8 border-r border-emerald-100">
                        <label class="block text-emerald-900 font-bold mb-4">Image du produit</label>
                        
                        <div class="relative group rounded-2xl overflow-hidden shadow-md bg-white mb-6 aspect-square">
                            <img id="preview-image" 
                                 src="{{ asset('storage/' . $produit->image_url) }}" 
                                 class="w-full h-full object-cover transition duration-300 group-hover:opacity-75">
                            
                            <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <span class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">Changer l'image</span>
                            </div>
                            
                            <input type="file" name="image_url" id="image-input" 
                                   class="absolute inset-0 opacity-0 cursor-pointer z-20">
                        </div>
                        
                        <p class="text-xs text-emerald-600 italic">
                            <i class="fa-solid fa-circle-info mr-1"></i> 
                            Cliquez sur l'image pour charger un nouveau fichier (JPG, PNG).
                        </p>
                    </div>

                    <div class="lg:w-3/5 p-8 lg:p-10">
                        <div class="flex justify-between items-center mb-8">
                            <h2 class="text-2xl font-bold text-slate-800">Modifier la Plante</h2>
                            <span class="text-xs font-mono bg-slate-100 px-3 py-1 rounded-full text-slate-500">ID: #{{ $produit->id }}</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2 space-y-2">
                                <label class="text-sm font-bold text-slate-700">Nom de la plante</label>
                                <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700">Catégorie</label>
                                <select name="categorie_id" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition bg-white">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $produit->categorie_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700">Prix (€)</label>
                                <div class="relative">
                                    <input type="number" step="0.01" name="prix" value="{{ old('prix', $produit->prix) }}" 
                                        class="w-full pl-4 pr-10 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none">
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">€</span>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-slate-700">Stock actuel</label>
                                <input type="number" name="stock" value="{{ old('stock', $produit->stock) }}" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none">
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-sm font-bold text-slate-700">Description</label>
                                <textarea name="description" rows="4" 
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">{{ old('description', $produit->description) }}</textarea>
                            </div>
                        </div>

                        <div class="mt-10 flex flex-col sm:flex-row gap-4">
                            <button type="submit" 
                                class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-emerald-200 transition transform hover:-translate-y-1">
                                Sauvegarder les modifications
                            </button>
                            <a href="{{ route('Produit.show', $produit->id) }}" 
                                class="px-8 flex items-center justify-center font-bold text-slate-500 hover:text-slate-700 transition">
                                Annuler
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('image-input').onchange = evt => {
        const [file] = document.getElementById('image-input').files;
        if (file) {
            document.getElementById('preview-image').src = URL.createObjectURL(file);
        }
    }
</script>
</body>
</html>