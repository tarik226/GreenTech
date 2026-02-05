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
    @if(session('error')) 
    <div class="alert alert-danger" style="padding:10px; border-radius:5px; background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb;"> 
        {{ session('error') }} 
    </div> 
@endif
    <div class="min-h-screen bg-white flex">
    <div class="hidden lg:flex lg:w-1/2 bg-emerald-700 p-12 flex-col justify-between text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-tight">Plantly</h1>
        </div>
        
        <div class="relative z-10">
            <h2 class="text-5xl font-bold leading-tight mb-6">Bon retour parmi <br> nos passionnés.</h2>
            <p class="text-emerald-100 text-lg max-w-md leading-relaxed">
                Connectez-vous pour gérer votre collection, découvrir de nouvelles espèces et retrouver vos plantes favorites.
            </p>
        </div>

        <div class="relative z-10 flex items-center gap-4 text-sm font-medium text-emerald-200">
            <span>© 2026 Plantly Inc.</span>
            <span class="w-1 h-1 bg-emerald-400 rounded-full"></span>
            <a href="#" class="hover:text-white transition">Privacy Policy</a>
        </div>

        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-emerald-600 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
        <div class="absolute top-1/2 -right-24 w-72 h-72 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12 lg:p-20">
        <div class="w-full max-w-md">
            <div class="mb-10">
                <h3 class="text-3xl font-bold text-slate-900 mb-2">Se connecter</h3>
                <p class="text-slate-500">Heureux de vous revoir ! Entrez vos accès.</p>
            </div>

            <form action="{{route('login')}}" method="POST" class="space-y-6">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700">Email</label>
                    <input type="email" name="email" required placeholder="name@company.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                </div>

                <div class="space-y-2">
                    <div class="flex justify-between">
                        <label class="text-sm font-bold text-slate-700">Mot de passe</label>
                        <a href="#" class="text-xs font-bold text-emerald-600 hover:text-emerald-700">Oublié ?</a>
                    </div>
                    <input type="password" name="password" required placeholder="••••••••"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 outline-none transition">
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-emerald-200 transition-all">
                    Se connecter
                </button>
            </form>

            <p class="mt-8 text-center text-slate-500 text-sm">
                Pas encore de compte ? 
                <a href="{{route('registerform')}} " class="text-emerald-600 font-bold hover:underline">S'inscrire gratuitement</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>