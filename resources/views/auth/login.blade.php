@extends('layouts.app')

@section('title','Login')

@section('content')

  <!-- LOGIN PAGE (unique card) -->
  <div class="w-full max-w-md">
    <!-- subtle card with floating effect -->
    <div class="bg-white/80 backdrop-blur-sm rounded-3xl shadow-2xl border border-white/40 p-8 sm:p-10">
      
      <!-- header with logo & app name -->
      <div class="flex items-center gap-3 mb-6">
        <div class="bg-indigo-600 text-white p-3 rounded-2xl shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-7 h-7">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
          </svg>
        </div>
        <span class="text-3xl font-semibold text-slate-800 tracking-tight">EasyColoc</span>
      </div>

      <h1 class="text-2xl font-bold text-slate-800 mb-2">Content de te revoir</h1>
      <p class="text-slate-500 text-sm mb-8">Connecte‑toi pour accéder aux dépenses et équilibrer les comptes.</p>

      <!-- login form -->
      <form class="space-y-5">
        <!-- email field -->
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1.5">E-mail</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
              </svg>
            </div>
            <input type="email" placeholder="coloc@exemple.fr" class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 focus:border-indigo-300 outline-none transition" required>
          </div>
        </div>

        <!-- password field -->
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1.5">Mot de passe</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
              </svg>
            </div>
            <input type="password" placeholder="··········" class="w-full pl-11 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 focus:border-indigo-300 outline-none transition" required>
          </div>
          <div class="flex justify-end mt-2">
            <a href="#" class="text-xs text-indigo-600 hover:text-indigo-800 font-medium hover:underline underline-offset-2">Mot de passe oublié ?</a>
          </div>
        </div>

        <!-- submit button -->
        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 rounded-xl shadow-md shadow-indigo-200 hover:shadow-indigo-300 transition duration-200 flex items-center justify-center gap-2">
          <span>Se connecter</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
        </button>
      </form>

      <!-- signup redirect -->
      <div class="mt-8 text-center border-t border-slate-200 pt-6">
        <p class="text-slate-600 text-sm">
          Pas encore de compte ?
          <a href="{{ route('register') }}" class="ml-1 font-semibold text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2">Inscris‑toi →</a>
        </p>
        <!-- note: the signup page will be separate (same folder) -->
      </div>

      <!-- demo hint (optional) -->
      <p class="text-xs text-slate-400 text-center mt-5">Dépenses communes • répartition automatique</p>
    </div>
  </div>
@endsection