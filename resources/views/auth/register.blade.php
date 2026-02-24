<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EasyColoc · Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', system-ui, sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-indigo-100 flex items-center justify-center p-5">

  <!-- SIGNUP PAGE (unique card) -->
  <div class="w-full max-w-md">
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

      <h1 class="text-2xl font-bold text-slate-800 mb-2">Rejoins la coloc</h1>
      <p class="text-slate-500 text-sm mb-7">Crée ton compte et simplifie la gestion des dépenses avec tes colocataires.</p>

      <!-- signup form (more fields) -->
      <form class="space-y-4">
        <!-- first & last name (side by side) -->
        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Prénom</label>
            <input type="text" placeholder="Alex" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition" required>
          </div>
          <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">Nom</label>
            <input type="text" placeholder="Dupont" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition" required>
          </div>
        </div>

        <!-- email (full width) -->
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">E-mail</label>
          <input type="email" placeholder="alex.dupont@exemple.fr" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition" required>
        </div>

        <!-- password + confirmation -->
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Mot de passe</label>
          <input type="password" placeholder="au moins 8 caractères" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-slate-700 mb-1">Confirmer le mot de passe</label>
          <input type="password" placeholder="········" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50/70 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition" required>
        </div>

        <!-- optional invitation code (fits coloc theme) -->
        <div class="flex items-center gap-2 bg-indigo-50/70 p-3 rounded-xl border border-dashed border-indigo-200">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
          <span class="text-sm text-slate-600">Code invitation (optionnel)</span>
          <input type="text" placeholder="COLOC2025" class="ml-auto w-32 sm:w-36 px-3 py-2 rounded-lg border border-slate-200 bg-white text-sm focus:ring-2 focus:ring-indigo-300 outline-none">
        </div>

        <!-- terms & conditions checkbox -->
        <div class="flex items-start gap-3 pt-2">
          <input type="checkbox" id="terms" class="mt-1 accent-indigo-600 w-4 h-4 rounded border-slate-300" required>
          <label for="terms" class="text-xs text-slate-500 leading-relaxed">
            J’accepte les <a href="#" class="text-indigo-600 font-medium hover:underline">conditions d’utilisation</a> et la <a href="#" class="text-indigo-600 font-medium hover:underline">politique de confidentialité</a>.
          </label>
        </div>

        <!-- signup button (different style, still indigo) -->
        <button type="submit" class="w-full mt-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3.5 rounded-xl shadow-md shadow-indigo-200 hover:shadow-indigo-300 transition duration-200 flex items-center justify-center gap-2">
          <span>Créer mon compte</span>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
          </svg>
        </button>
      </form>

      <!-- login redirect -->
      <div class="mt-8 text-center border-t border-slate-200 pt-6">
        <p class="text-slate-600 text-sm">
          Déjà membre ?
          <a href="easycoloc-login.html" class="ml-1 font-semibold text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2">Connecte‑toi ←</a>
        </p>
      </div>

      <!-- app baseline -->
      <p class="text-xs text-slate-400 text-center mt-5">Dépenses communes • répartition automatique</p>
    </div>
  </div>

  <!-- end of SIGNUP page -->
</body>
</html>