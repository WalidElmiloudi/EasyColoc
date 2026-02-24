<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EasyColoc · Administration</title>
  <!-- Tailwind + Inter font -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', system-ui, sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-slate-50">

  <!-- ========== TOP NAVIGATION (ADMIN) ========== -->
  <nav class="bg-white border-b border-slate-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- left: logo + app name + admin badge -->
        <div class="flex items-center gap-4">
          <div class="flex items-center gap-2">
            <div class="bg-indigo-600 text-white p-2 rounded-xl">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
              </svg>
            </div>
            <span class="text-xl font-semibold text-slate-800">EasyColoc</span>
          </div>
          <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full border border-red-200">Administration</span>
        </div>

        <!-- right: admin avatar -->
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center font-semibold text-sm">AD</div>
          <span class="text-sm text-slate-600 hidden sm:inline">Admin</span>
        </div>
      </div>
    </div>
  </nav>

  <!-- ========== MAIN ADMIN CONTENT ========== -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <!-- header -->
    <div class="mb-8">
      <h1 class="text-3xl font-bold text-slate-800">Panneau d'administration</h1>
      <p class="text-slate-500 mt-1">Gère les utilisateurs, consulte les statistiques et modère les comptes.</p>
    </div>

    <!-- STATISTICS CARDS (4) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
      <!-- card 1: total users -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-slate-500">Utilisateurs</p>
            <p class="text-2xl font-bold text-slate-800">1,482</p>
          </div>
          <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
            </svg>
          </div>
        </div>
        <p class="text-xs text-emerald-600 mt-2">+12 cette semaine</p>
      </div>
      <!-- card 2: active colocations -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-slate-500">Colocations actives</p>
            <p class="text-2xl font-bold text-slate-800">324</p>
          </div>
          <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
          </div>
        </div>
        <p class="text-xs text-slate-400 mt-2">Moyenne 4.2 membres</p>
      </div>
      <!-- card 3: total dépenses -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-slate-500">Dépenses totales</p>
            <p class="text-2xl font-bold text-slate-800">48 250 €</p>
          </div>
          <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
        </div>
        <p class="text-xs text-slate-400 mt-2">Ce mois: 6 230 €</p>
      </div>
      <!-- card 4: utilisateurs bannis -->
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-slate-500">Utilisateurs bannis</p>
            <p class="text-2xl font-bold text-slate-800">8</p>
          </div>
          <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
            </svg>
          </div>
        </div>
        <p class="text-xs text-rose-600 mt-2">+2 cette semaine</p>
      </div>
    </div>

    <!-- SEARCH AND FILTER BAR -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5 mb-8">
      <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
        <div class="relative w-full sm:w-96">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-slate-400">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
          </div>
          <input type="text" placeholder="Rechercher un utilisateur (nom, email...)" class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
        </div>
        <div class="flex gap-2 w-full sm:w-auto">
          <select class="px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-indigo-300 outline-none transition text-sm">
            <option>Tous les statuts</option>
            <option>Actif</option>
            <option>Banni</option>
            <option>En attente</option>
          </select>
          <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm transition flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
              <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            Rechercher
          </button>
        </div>
      </div>
    </div>

    <!-- USERS TABLE (with ban/unban actions) -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
          <thead class="bg-slate-50 border-b border-slate-200 text-slate-600">
            <tr>
              <th class="px-6 py-4 font-semibold">Utilisateur</th>
              <th class="px-6 py-4 font-semibold">Email</th>
              <th class="px-6 py-4 font-semibold">Colocations</th>
              <th class="px-6 py-4 font-semibold">Statut</th>
              <th class="px-6 py-4 font-semibold">Inscrit le</th>
              <th class="px-6 py-4 font-semibold text-right">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-200">
            <!-- ligne 1 : actif -->
            <tr class="hover:bg-slate-50">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 flex items-center justify-center font-semibold text-xs">AD</div>
                  <span class="font-medium text-slate-800">Alex Dupont</span>
                </div>
              </td>
              <td class="px-6 py-4 text-slate-600">alex.d@exemple.fr</td>
              <td class="px-6 py-4">2</td>
              <td class="px-6 py-4">
                <span class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full">Actif</span>
              </td>
              <td class="px-6 py-4 text-slate-500">12/03/2025</td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2">
                  <button class="p-1.5 text-slate-400 hover:text-red-500 transition" title="Bannir">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition" title="Voir détails">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
            <!-- ligne 2 : actif -->
            <tr class="hover:bg-slate-50">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-semibold text-xs">CM</div>
                  <span class="font-medium text-slate-800">Clara Martin</span>
                </div>
              </td>
              <td class="px-6 py-4 text-slate-600">clara.m@exemple.fr</td>
              <td class="px-6 py-4">1</td>
              <td class="px-6 py-4">
                <span class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full">Actif</span>
              </td>
              <td class="px-6 py-4 text-slate-500">05/01/2025</td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2">
                  <button class="p-1.5 text-slate-400 hover:text-red-500 transition" title="Bannir">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition" title="Voir détails">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
            <!-- ligne 3 : banni -->
            <tr class="hover:bg-slate-50 bg-red-50/30">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-slate-300 text-slate-600 flex items-center justify-center font-semibold text-xs">JP</div>
                  <span class="font-medium text-slate-800">Julien Petit</span>
                </div>
              </td>
              <td class="px-6 py-4 text-slate-600">julien.p@exemple.fr</td>
              <td class="px-6 py-4">0</td>
              <td class="px-6 py-4">
                <span class="bg-red-100 text-red-700 text-xs font-medium px-3 py-1 rounded-full">Banni</span>
              </td>
              <td class="px-6 py-4 text-slate-500">20/02/2025</td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2">
                  <button class="p-1.5 text-slate-400 hover:text-emerald-600 transition" title="Débannir">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition" title="Voir détails">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
            <!-- ligne 4 : actif -->
            <tr class="hover:bg-slate-50">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-semibold text-xs">SL</div>
                  <span class="font-medium text-slate-800">Sophie Lefebvre</span>
                </div>
              </td>
              <td class="px-6 py-4 text-slate-600">sophie.l@exemple.fr</td>
              <td class="px-6 py-4">3</td>
              <td class="px-6 py-4">
                <span class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full">Actif</span>
              </td>
              <td class="px-6 py-4 text-slate-500">10/04/2025</td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2">
                  <button class="p-1.5 text-slate-400 hover:text-red-500 transition" title="Bannir">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition" title="Voir détails">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
            <!-- ligne 5 : actif -->
            <tr class="hover:bg-slate-50">
              <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                  <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-semibold text-xs">TR</div>
                  <span class="font-medium text-slate-800">Thomas Robert</span>
                </div>
              </td>
              <td class="px-6 py-4 text-slate-600">thomas.r@exemple.fr</td>
              <td class="px-6 py-4">1</td>
              <td class="px-6 py-4">
                <span class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full">Actif</span>
              </td>
              <td class="px-6 py-4 text-slate-500">22/02/2025</td>
              <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2">
                  <button class="p-1.5 text-slate-400 hover:text-red-500 transition" title="Bannir">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                  </button>
                  <button class="p-1.5 text-slate-400 hover:text-indigo-600 transition" title="Voir détails">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- pagination simple -->
      <div class="bg-slate-50 border-t border-slate-200 px-6 py-3 flex items-center justify-between">
        <p class="text-xs text-slate-500">Affichage de 1 à 5 sur 42 utilisateurs</p>
        <div class="flex gap-2">
          <button class="px-3 py-1 rounded border border-slate-200 bg-white text-sm text-slate-600 hover:bg-slate-50">Précédent</button>
          <button class="px-3 py-1 rounded border border-indigo-600 bg-indigo-600 text-white text-sm">1</button>
          <button class="px-3 py-1 rounded border border-slate-200 bg-white text-sm text-slate-600 hover:bg-slate-50">2</button>
          <button class="px-3 py-1 rounded border border-slate-200 bg-white text-sm text-slate-600 hover:bg-slate-50">3</button>
          <button class="px-3 py-1 rounded border border-slate-200 bg-white text-sm text-slate-600 hover:bg-slate-50">Suivant</button>
        </div>
      </div>
    </div>

    <!-- quick stats / recent activity (optional) -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-5">
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <h3 class="font-semibold text-slate-800 mb-3 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
          </svg>
          Inscriptions récentes
        </h3>
        <ul class="space-y-2 text-sm">
          <li class="flex justify-between"><span>Sophie Lefebvre</span><span class="text-slate-400">10/04/2025</span></li>
          <li class="flex justify-between"><span>Lucas Moreau</span><span class="text-slate-400">09/04/2025</span></li>
          <li class="flex justify-between"><span>Emma Bernard</span><span class="text-slate-400">08/04/2025</span></li>
        </ul>
      </div>
      <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
        <h3 class="font-semibold text-slate-800 mb-3 flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Actions récentes
        </h3>
        <ul class="space-y-2 text-sm">
          <li class="flex justify-between"><span>Bannissement de J. Petit</span><span class="text-slate-400">il y a 2h</span></li>
          <li class="flex justify-between"><span>Réactivation de M. Durand</span><span class="text-slate-400">hier</span></li>
          <li class="flex justify-between"><span>Nouvelle coloc "Villa Verte"</span><span class="text-slate-400">hier</span></li>
        </ul>
      </div>
    </div>
  </main>

  <!-- ========== FOOTER ========== -->
  <footer class="border-t border-slate-200 mt-12 py-5 text-center text-xs text-slate-400">
    EasyColoc · Administration · Tous droits réservés
  </footer>
</body>
</html>