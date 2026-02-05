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
    @if ($errors->any()) 
        <div class="alert alert-danger"> 
            <ul> 
                @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li> 
                @endforeach 
            </ul> 
        </div> 
    @endif
    <div class="min-h-screen bg-white flex">
    <div class="hidden lg:flex lg:w-1/2 bg-emerald-700 p-12 flex-col justify-between text-white relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold tracking-tight">Plantly</h1>
        </div>
        
        <div class="relative z-10">
            <h2 class="text-5xl font-bold leading-tight mb-6">Rejoignez la <br> communauté.</h2>
            <ul class="space-y-4">
                <li class="flex items-center gap-3 text-emerald-100">
                    <i class="fa-solid fa-circle-check text-emerald-400"></i> Sauvegardez vos plantes préférées
                </li>
                <li class="flex items-center gap-3 text-emerald-100">
                    <i class="fa-solid fa-circle-check text-emerald-400"></i> Suivez vos stocks en temps réel
                </li>
                <li class="flex items-center gap-3 text-emerald-100">
                    <i class="fa-solid fa-circle-check text-emerald-400"></i> Accédez à des conseils d'entretien
                </li>
            </ul>
        </div>

        <div class="relative z-10 text-sm text-emerald-200 italic">
            "La meilleure plateforme pour gérer ma pépinière." — Sarah B.
        </div>

        <div class="absolute -top-24 -right-24 w-96 h-96 bg-emerald-800 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center p-8 sm:p-12">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h3 class="text-3xl font-bold text-slate-900 mb-2">Créer un compte</h3>
                <p class="text-slate-500">Commencez votre aventure végétale aujourd'hui.</p>
            </div>

            <form action="{{route('register')}}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700">Nom Complet</label>
                    <input value="{{old('name')}}" type="text" name="name" required placeholder="Jean Dupont"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    @error('name')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-slate-700">Email</label>
                    <input value="{{old('email')}}" type="email" name="email" required placeholder="jean@exemple.com"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    @error('email')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700">Mot de passe</label>
                        <input type="password" name="password" required placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-slate-700">Confirmer</label>
                        <input type="password" name="password_confirmation" required placeholder="••••••••"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-emerald-500 outline-none transition">
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex items-start gap-3 py-2">
                    <input type="checkbox" required class="mt-1 accent-emerald-600">
                    <span class="text-xs text-slate-500 leading-snug">J'accepte les conditions d'utilisation et la politique de confidentialité.</span>
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-4 rounded-xl shadow-lg transition-all transform hover:-translate-y-1">
                    Créer mon compte
                </button>
            </form>

            <p class="mt-8 text-center text-slate-500 text-sm">
                Déjà un compte ? 
                <a href="login" class="text-emerald-600 font-bold hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
</div>
</body>
</html>