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
    
    <div class="min-h-screen bg-emerald-50 py-12 px-4">
    <div class="max-w-2xl mx-auto">
        <a href="{{ route('Produit.index') }}" class="text-emerald-700 hover:text-emerald-900 font-semibold mb-6 inline-flex items-center gap-2 transition">
            <i class="fa-solid fa-arrow-left"></i> Retour aux produits
        </a>

        <div class="bg-white rounded-3xl shadow-xl shadow-emerald-900/5 border border-emerald-100 overflow-hidden">
            <div class="bg-emerald-600 px-8 py-6">
                <h2 class="text-2xl font-bold text-white">Ajouter une nouvelle plante</h2>
                <p class="text-emerald-100 text-sm">Remplissez les informations ci-dessous pour enrichir votre catalogue.</p>
            </div>

            <form action="{{ route('Produit.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-2 md:col-span-2">
                        <label for="nom" class="block text-sm font-bold text-emerald-900">Nom de la plante</label>
                        <input type="text" name="nom" id="nom" required placeholder="ex: Monstera Deliciosa"
                            class="w-full px-4 py-3 rounded-xl border border-emerald-100 bg-emerald-50/30 focus:ring-2 focus:ring-emerald-500 focus:bg-white outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label for="categorie_id" class="block text-sm font-bold text-emerald-900">Catégorie</label>
                        <select name="categorie_id" id="categorie_id" required
                            class="w-full px-4 py-3 rounded-xl border border-emerald-100 bg-emerald-50/30 focus:ring-2 focus:ring-emerald-500 focus:bg-white outline-none transition">
                            <option value="">Choisir...</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label for="prix" class="block text-sm font-bold text-emerald-900">Prix (MAD)</label>
                        <input type="number" name="prix" id="prix" step="10" required placeholder="0.00"
                            class="w-full px-4 py-3 rounded-xl border border-emerald-100 bg-emerald-50/30 focus:ring-2 focus:ring-emerald-500 focus:bg-white outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label for="stock" class="block text-sm font-bold text-emerald-900">Quantité en stock</label>
                        <input type="number" name="stock" id="stock" required placeholder="0"
                            class="w-full px-4 py-3 rounded-xl border border-emerald-100 bg-emerald-50/30 focus:ring-2 focus:ring-emerald-500 focus:bg-white outline-none transition">
                    </div>

                    <div class="space-y-2">
                        <label for="image_url" class="block text-sm font-bold text-emerald-900">Photo de la plante</label>
                        <div class="relative group">
                            <input type="file" name="image_url" id="image_url" required
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="w-full px-4 py-3 rounded-xl border-2 border-dashed border-emerald-200 bg-emerald-50/30 group-hover:bg-emerald-50 group-hover:border-emerald-400 transition flex items-center justify-center gap-2 text-emerald-600">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span class="text-sm font-medium">Choisir un fichier</span>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2 md:col-span-2">
                        <label for="description" class="block text-sm font-bold text-emerald-900">Description</label>
                        <textarea name="description" id="description" rows="4" placeholder="Détails sur l'entretien, l'exposition..."
                            class="w-full px-4 py-3 rounded-xl border border-emerald-100 bg-emerald-50/30 focus:ring-2 focus:ring-emerald-500 focus:bg-white outline-none transition"></textarea>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" 
                        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-emerald-200 transition-all transform hover:-translate-y-1">
                        Enregistrer la plante
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>