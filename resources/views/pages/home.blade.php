<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EasyColoc · Tableau de bord</title>
  <!-- Tailwind + Inter font -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', system-ui, sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-slate-50">

  <!-- ========== TOP NAVIGATION (SIMPLE) ========== -->
  <nav class="bg-white border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- left: logo + app name -->
        <div class="flex items-center gap-2">
          <div class="bg-indigo-600 text-white p-2 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
          </div>
          <span class="text-xl font-semibold text-slate-800">EasyColoc</span>
        </div>

        <!-- right: quick user avatar (just visual) -->
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center font-semibold text-sm">AD</div>
          <span class="text-sm text-slate-600 hidden sm:inline">Alex D.</span>
        </div>
      </div>
    </div>
  </nav>

  <!-- ========== MAIN DASHBOARD (SIMPLE, BUTTON‑BASED) ========== -->
  <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- welcome header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-slate-800">Bonjour Alex 👋</h1>
      <p class="text-slate-500 mt-1">Que souhaites‑tu faire ?</p>
    </div>

    <!-- three‑column card layout (profile summary + two action cards) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      
      <!-- CARD 1 : PROFILE SUMMARY (no inline edit, just display + button) -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col">
        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
          </svg>
          Mon profil
        </h2>
        <!-- compact info -->
        <div class="flex items-center gap-3 pb-4 mb-3 border-b border-slate-100">
          <div class="w-12 h-12 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center text-lg font-bold">AD</div>
          <div>
            <p class="font-medium text-slate-800">Alex Dupont</p>
            <p class="text-xs text-slate-500">alex.d@exemple.fr</p>
          </div>
        </div>
        <!-- only one button: modify profile (no inline form) -->
        <button class="mt-auto w-full bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-medium py-2.5 px-4 rounded-xl border border-indigo-200 transition flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
          </svg>
          Modifier mon profil
        </button>
        <!-- no extra fields, no password change – just a button -->
      </div>

      <!-- CARD 2 : CRÉER UNE COLOCATION (simple button leads to form or modal) -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col">
        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          Créer une coloc
        </h2>
        <p class="text-sm text-slate-500 mb-4">Tu n’as pas encore de colocation. Lance‑toi en créant un nouveau groupe.</p>
        <button class="mt-auto w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-4 rounded-xl shadow-md shadow-indigo-200 transition flex items-center justify-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
          </svg>
          Nouvelle colocation
        </button>
        <!-- only one button: create -->
      </div>

      <!-- CARD 3 : REJOINDRE AVEC UN CODE (token / invitation) -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col">
        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
          Rejoindre
        </h2>
        <p class="text-sm text-slate-500 mb-4">Un ami a déjà créé une coloc ? Utilise son code d’invitation.</p>
        <!-- small inline field for token + join button -->
        <div class="flex flex-col gap-3 mt-1">
          <input type="text" placeholder="ex : COLOC2025" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition text-sm">
          <button class="w-full bg-white hover:bg-slate-50 text-indigo-700 font-medium py-2.5 px-4 rounded-xl border-2 border-indigo-200 transition flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
            </svg>
            Valider le code
          </button>
        </div>
        <!-- note: the button acts as "join", token field is right there -->
      </div>
    </div>

    <!-- optional small info banner (no colocations yet) but it's minimal -->
    <div class="mt-8 bg-indigo-50/50 rounded-xl border border-indigo-100 p-4 text-sm text-slate-600 flex items-center gap-3">
      <span class="w-5 h-5 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 text-xs font-bold">i</span>
      <span>Tu n’es membre d’aucune colocation pour le moment. Crée‑en une ou rejoins‑en une avec un code.</span>
    </div>

    <!-- very simple footer (optional) -->
    <footer class="border-t border-slate-200 mt-12 pt-5 text-center text-xs text-slate-400">
      EasyColoc · dépenses communes & répartition automatique
    </footer>
  </main>
</body>
</html>