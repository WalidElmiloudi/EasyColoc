@extends('layouts.app')

@section('title', 'home')

@section('content')

    <!-- main container with sidebar + content -->
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <!-- ========== MAIN CONTENT ========== -->
        <main class="flex-1 overflow-y-auto bg-slate-50/80 p-6 md:p-8">

            <!-- top bar with page title & edit profile button -->
            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Tableau de bord</h1>
                    <p class="text-sm text-slate-500 mt-1">Bienvenue dans ta colocation, {{ auth()->user()->name }} 👋</p>
                </div>
                <!-- EDIT PROFILE BUTTON (access to modify profile) -->
                <a href="#"
                    class="inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-indigo-300 text-slate-700 font-medium px-5 py-2.5 rounded-xl shadow-sm transition shadow-indigo-100/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <span>Modifier mon profil</span>
                </a>
            </div>

            <!-- ===== SECTION: CRÉER UNE COLOCATION (if user has no coloc) ===== -->
            <div class="bg-white rounded-2xl border border-indigo-100 p-6 md:p-8 mb-8 shadow-md shadow-indigo-50/30">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                    <div>
                        <span
                            class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full mb-3">PREMIERS
                            PAS</span>
                        <h2 class="text-2xl font-semibold text-slate-800">Tu n'as pas encore de colocation</h2>
                        <p class="text-slate-500 max-w-xl mt-1">Crée une nouvelle colocation ou rejoins une existante avec
                            un code d'invitation.</p>
                    </div>
                    <div class="flex gap-3">
                        <button id="openCreateModalBtn"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-6 py-3.5 rounded-xl shadow-lg shadow-indigo-200 flex items-center gap-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            <span>Créer une colocation</span>
                        </button>
                        <button
                            class="bg-white border border-slate-200 hover:border-indigo-300 text-slate-700 font-medium px-6 py-3.5 rounded-xl shadow-sm flex items-center gap-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                            </svg>
                            Rejoindre avec un code
                        </button>
                    </div>
                </div>
            </div>

            <!-- ===== INFOS PERSOS / MEMBRE ===== -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- profile summary card (member infos) -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                        <h3 class="font-semibold text-slate-700 mb-4 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            Mes informations
                        </h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between border-b border-slate-100 pb-2">
                                <span class="text-slate-500">Nom complet</span>
                                <span class="font-medium text-slate-800">{{ auth()->user()->name }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-100 pb-2">
                                <span class="text-slate-500">E-mail</span>
                                <span class="font-medium text-slate-800">{{ auth()->user()->email }}</span>
                            </div>
                            <div class="flex justify-between border-b border-slate-100 pb-2">
                                <span class="text-slate-500">Rôle</span>
                                <span
                                    class="bg-amber-100 text-amber-700 text-xs px-2 py-0.5 rounded-full">{{Str::ucfirst(auth()->user()->role)}}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Membre depuis</span>
                                <span class="font-medium text-slate-800">{{ auth()->user()->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                        <!-- small edit link inside card -->
                        <div class="mt-5 pt-2 border-t border-slate-100">
                            <a href="#"
                                class="text-indigo-600 hover:text-indigo-700 text-sm font-medium inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                                Modifier mon profil
                            </a>
                        </div>
                    </div>
                </div>

                <!-- right area: placeholder for colocation preview / actions -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm h-full flex flex-col">
                        <h3 class="font-semibold text-slate-700 mb-3 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205 3 1m1.5.5-1.5-.5M6.75 7.364V3h-3v18m3-13.636 10.5-3.819" />
                            </svg>
                            Aperçu de la colocation
                        </h3>
                        <p class="text-slate-500 text-sm mb-4">Tu n'es encore dans aucune colocation. Utilise le bouton
                            ci-dessus pour en créer une ou en rejoindre.</p>
                        <!-- dummy placeholder with illustration -->
                        <div
                            class="bg-slate-50 rounded-xl border border-dashed border-slate-200 p-8 text-center flex-1 flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-12 h-12 text-slate-300 mb-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                            <p class="text-sm text-slate-400">Aucune colocation associée pour le moment.</p>
                        </div>
                        <!-- small admin hint -->
                        <p class="text-xs text-slate-400 mt-4">En tant qu’admin, tu pourras gérer les membres et modifier
                            les infos de la coloc.</p>
                    </div>
                </div>
            </div>
            <div id="createColocModal"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
                <!-- MODAL PANEL -->
                <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-white/30">
                    <div class="p-6">
                        <!-- HEADER -->
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Créer une colocation
                            </h3>
                            <!-- bouton fermer (X) -->
                            <button id="closeModalBtn" class="text-slate-400 hover:text-slate-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-sm text-slate-500 mb-5">
                            Crée un nouveau groupe de colocation. Tu pourras inviter des membres et gérer les dépenses
                            ensuite.
                        </p>

                        <!-- FORMULAIRE -->
                        <form id="createColocForm" class="space-y-4" action="{{ route('colocations') }}" method="post">
                          @csrf
                            <!-- Nom de la colocation (required) -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">
                                    Nom de la colocation <span class="text-red-400">*</span>
                                </label>
                                <input type="text" name="name" placeholder="ex : Coloc’ Montreuil" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                            </div>

                            <!-- message info -->
                            <div
                                class="bg-indigo-50/70 p-3 rounded-lg border border-indigo-100 text-xs text-indigo-700 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 mt-0.5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>
                                <span>Les dépenses et leur répartition se géreront directement dans la colocation.</span>
                            </div>

                            <!-- BOUTONS -->
                            <div class="flex gap-3 pt-3">
                                <button type="submit"
                                    class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-xl shadow-sm transition">
                                    Créer la coloc
                                </button>
                                <button type="button" id="cancelModalBtn"
                                    class="flex-1 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium py-2.5 px-4 rounded-xl transition">
                                    Annuler
                                </button>
                            </div>
                        </form>

                        <p class="text-xs text-slate-400 text-center mt-4">
                            Un code d'invitation unique sera généré automatiquement.
                        </p>
                    </div>
                </div>
            </div>

        </main>
    </div>
      <script>
    (function() {
      // Récupération des éléments
      const openBtn = document.getElementById('openCreateModalBtn');
      const modal = document.getElementById('createColocModal');
      const closeBtn = document.getElementById('closeModalBtn');
      const cancelBtn = document.getElementById('cancelModalBtn');
      const form = document.getElementById('createColocForm');

      // Ouvrir la modale
      openBtn.addEventListener('click', function() {
        modal.classList.remove('hidden');
        // optionnel : empêcher le scroll de l'arrière-plan
        document.body.style.overflow = 'hidden';
      });

      // Fonction pour fermer la modale
      function closeModal() {
        modal.classList.add('hidden');
        document.body.style.overflow = ''; // restaurer le scroll
      }

      // Fermer avec le X
      closeBtn.addEventListener('click', closeModal);
      // Fermer avec le bouton Annuler
      cancelBtn.addEventListener('click', closeModal);

      // Fermer en cliquant sur le fond (backdrop)
      modal.addEventListener('click', function(e) {
        if (e.target === modal) {
          closeModal();
        }
      });

      // Nettoyage au cas où la modale serait ouverte par défaut (non, elle a class hidden)
      // mais on s'assure que le scroll est actif au load
      window.addEventListener('load', function() {
        document.body.style.overflow = '';
      });
    })();
  </script>
@endsection
