@extends('layouts.guest')

@section('title', 'Register')

@section('content')
    <!-- SIGNUP PAGE (unique card) -->
    <div class="w-full max-w-md">
        <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/40 p-8 sm:p-10">

            <!-- header with logo & app name -->
            <div class="flex items-center gap-3 mb-6">
                <div class="bg-indigo-600 text-white p-3 rounded-2xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <span class="text-3xl font-semibold text-slate-800 tracking-tight">EasyColoc</span>
            </div>

            <h1 class="text-2xl font-bold text-slate-800 mb-2">Rejoins la coloc</h1>
            <p class="text-slate-500 text-sm mb-7">Crée ton compte et simplifie la gestion des dépenses avec tes
                colocataires.</p>
            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-700 text-sm">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- signup form (more fields) -->
            <form class="space-y-4" action="{{ route('register') }}" method="POST">
                @csrf
                <!-- first & last name (side by side) -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Prénom</label>
                        <input type="text" name="firstname" placeholder="Alex"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Nom</label>
                        <input type="text" name="lastname" placeholder="Dupont"
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition"
                            required>
                    </div>
                </div>

                <!-- email (full width) -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">E-mail</label>
                    <input type="email" name="email" placeholder="alex.dupont@exemple.fr"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition"
                        required>
                </div>

                <!-- password + confirmation -->
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Mot de passe</label>
                    <input type="password" name="password" placeholder="au moins 8 caractères"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" placeholder="········"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition"
                        required>
                </div>

                <!-- signup button (different style, still indigo) -->
                <button type="submit"
                    class="w-full mt-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 rounded-xl shadow-md shadow-indigo-200 hover:shadow-indigo-300 transition duration-200 flex items-center justify-center gap-2">
                    <span>Créer mon compte</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>
                </button>
            </form>

            <!-- login redirect -->
            <div class="mt-8 text-center border-t border-slate-200 pt-6">
                <p class="text-slate-600 text-sm">
                    Déjà membre ?
                    <a href="{{ route('login') }}"
                        class="ml-1 font-semibold text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2">Connecte‑toi
                        ←</a>
                </p>
            </div>

            <!-- app baseline -->
            <p class="text-xs text-slate-400 text-center mt-5">Dépenses communes • répartition automatique</p>
        </div>
    </div>
@endsection
