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
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-bold text-emerald-950">Catégories</h1>
                <p class="text-emerald-600/80 text-sm">Gérez les segments de votre collection de plantes.</p>
            </div>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-emerald-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-emerald-50/50">
                            <th class="px-8 py-5 text-xs uppercase tracking-wider font-bold text-emerald-700">Nom de la Catégorie</th>
                            <th class="px-8 py-5 text-xs uppercase tracking-wider font-bold text-emerald-700 text-center">Nombre de Produits</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-emerald-50">
                        @foreach($categories as $category)
                        <tr class="group hover:bg-emerald-50/30 transition-colors">
                            <td class="px-8 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center text-emerald-600">
                                        <i class="fa-solid fa-leaf"></i>
                                    </div>
                                    <span class="font-bold text-slate-700 group-hover:text-emerald-700 transition-colors">
                                        {{ $category->nom }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-8 py-5 text-center">
                                <span class="inline-flex items-center justify-center bg-slate-100 text-slate-600 font-bold px-3 py-1 rounded-full text-sm min-w-[40px]">
                                    {{ $category->children()->count()}}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($categories->isEmpty())
            <div class="py-20 text-center">
                <div class="text-emerald-200 mb-4">
                    <i class="fa-solid fa-box-open text-6xl"></i>
                </div>
                <p class="text-slate-400">Aucune catégorie trouvée.</p>
            </div>
            @endif
        </div>

    </div>
</div>
</body>
</html>