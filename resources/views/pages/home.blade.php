@extends('layouts.app')

@section('title', 'home')

@section('content')

    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <main class="flex-1 overflow-y-auto bg-slate-50/80 p-6 md:p-8">

            <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Tableau de bord</h1>
                    <p class="text-sm text-slate-500 mt-1">Bienvenue dans ta colocation, {{ auth()->user()->name }} 👋</p>
                </div>
                <button id="openProfileModalBtn"
                    class="cursor-pointer inline-flex items-center gap-2 bg-white border border-slate-200 hover:border-indigo-300 text-slate-700 font-medium px-5 py-2.5 rounded-xl shadow-sm transition shadow-indigo-100/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    <span>Modifier mon profil</span>
                </button>
            </div>

            @if (!auth()->user()->colocation)
                <div class="bg-white rounded-2xl border border-indigo-100 p-6 md:p-8 mb-8 shadow-md shadow-indigo-50/30">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                        <div>
                            <span
                                class="inline-block bg-indigo-100 text-indigo-700 text-xs font-semibold px-3 py-1 rounded-full mb-3">PREMIERS
                                PAS</span>
                            <h2 class="text-2xl font-semibold text-slate-800">Tu n'as pas encore de colocation</h2>
                            <p class="text-slate-500 max-w-xl mt-1">Crée une nouvelle colocation ou rejoins une existante
                                avec
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
                            <button id="openJoinModalBtn"
                                class="bg-white border border-slate-200 hover:border-indigo-300 text-slate-700 font-medium px-6 py-3.5 rounded-xl shadow-sm flex items-center gap-2 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 8.25H7.5a2.25 2.25 0 0 0-2.25 2.25v9a2.25 2.25 0 0 0 2.25 2.25h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25H15m0-3-3-3m0 0-3 3m3-3V15" />
                                </svg>
                                Rejoindre avec un code
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
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
                                    class="bg-amber-100 text-amber-700 text-xs px-2 py-0.5 rounded-full">{{ Str::ucfirst(auth()->user()->role) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Membre depuis</span>
                                <span
                                    class="font-medium text-slate-800">{{ auth()->user()->created_at->format('M Y') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-slate-500">Reputation</span>
                                @if (auth()->user()->reputation > 0)
                                    <span class="font-medium text-green-800">{{ auth()->user()->reputation }}</span>
                                @elseif (auth()->user()->reputation < 0)
                                    <span class="font-medium text-red-800">{{ auth()->user()->reputation }}</span>
                                @else
                                    <span class="font-medium text-slate-800">{{ auth()->user()->reputation }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="createColocModal"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
                <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-white/30">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Créer une colocation
                            </h3>
                            <button id="closeCreateModalBtn" class="text-slate-400 hover:text-slate-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <p class="text-sm text-slate-500 mb-5">
                            Crée un nouveau groupe de colocation. Tu pourras inviter des membres et gérer les dépenses
                            ensuite.
                        </p>

                        <form id="createColocForm" class="space-y-4" action="{{ route('colocations') }}" method="post">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">
                                    Nom de la colocation <span class="text-red-400">*</span>
                                </label>
                                <input type="text" name="name" placeholder="ex : Coloc’ Montreuil" required
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                            </div>

                            <div
                                class="bg-indigo-50/70 p-3 rounded-lg border border-indigo-100 text-xs text-indigo-700 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 mt-0.5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>
                                <span>Les dépenses et leur répartition se géreront directement dans la colocation.</span>
                            </div>

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

            <div id="joinColocModal"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
                <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-white/30">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                                Rejoindre avec un code
                            </h3>
                            <button id="closeJoinModalBtn" class="text-slate-400 hover:text-slate-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <p class="text-sm text-slate-500 mb-5">Entre le code d'invitation que tu as reçu pour rejoindre une
                            colocation existante.</p>
                        <form id="joinColocForm" class="space-y-5" method="POST"
                            action="{{ route('colocations.join') }}">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Code d'invitation <span
                                        class="text-red-400">*</span></label>
                                <input type="text" name="token" placeholder="ex: XXXXXX" required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition text-center font-mono text-lg uppercase">
                            </div>
                            <div
                                class="bg-indigo-50/70 p-3 rounded-lg border border-indigo-100 text-xs text-indigo-700 flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-4 h-4 mt-0.5 shrink-0">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                                </svg>
                                <span>En rejoignant, tu auras accès aux dépenses et aux membres de cette colocation.</span>
                            </div>
                            <div class="flex gap-3 pt-3">
                                <button type="submit"
                                    class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-xl shadow-sm transition">Rejoindre</button>
                                <button type="button" id="cancelJoinModalBtn"
                                    class="flex-1 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium py-2.5 px-4 rounded-xl transition">Annuler</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="profileModal"
                class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
                <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-white/30">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                Modifier mon profil
                            </h3>
                            <button id="closeModalBtn" class="text-slate-400 hover:text-slate-600 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <p class="text-sm text-slate-500 mb-5">Mets à jour tes informations personnelles.</p>

                        <form id="profileForm" class="space-y-4" action="{{ route('profile.update') }}" method="post">
                            @csrf
                            @method('patch')
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Nom Complet</label>
                                <input type="text" name="name" value="{{ auth()->user()->name }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">E-mail</label>
                                <input type="email" name="email" value="{{ auth()->user()->email }}"
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                            </div>
                            <div class="flex gap-3 pt-3">
                                <button type="submit"
                                    class="cursor-pointer flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-xl shadow-sm transition">
                                    Enregistrer
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script>
        (function() {
            const openBtn = document.getElementById('openProfileModalBtn');
            const modal = document.getElementById('profileModal');
            const closeBtn = document.getElementById('closeModalBtn');
            const cancelBtn = document.getElementById('cancelModalBtn');
            const form = document.getElementById('profileForm');

            openBtn.addEventListener('click', function() {
                modal.classList.remove('hidden');
                document.body.classList.add('modal-open');
            });

            function closeModal() {
                modal.classList.add('hidden');
                document.body.classList.remove('modal-open');
            }

            closeBtn.addEventListener('click', closeModal);
            cancelBtn.addEventListener('click', closeModal);

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });

            window.addEventListener('load', function() {
                modal.classList.add('hidden');
                document.body.classList.remove('modal-open');
            });
        })();
        (function() {
            const openCreateBtn = document.getElementById('openCreateModalBtn');
            const createModal = document.getElementById('createColocModal');
            const closeCreateBtn = document.getElementById('closeCreateModalBtn');
            const cancelCreateBtn = document.getElementById('cancelCreateModalBtn');
            const createForm = document.getElementById('createColocForm');

            const openJoinBtn = document.getElementById('openJoinModalBtn');
            const joinModal = document.getElementById('joinColocModal');
            const closeJoinBtn = document.getElementById('closeJoinModalBtn');
            const cancelJoinBtn = document.getElementById('cancelJoinModalBtn');
            const joinForm = document.getElementById('joinColocForm');

            function closeModal(modal) {
                if (modal) modal.classList.add('hidden');
                if (createModal.classList.contains('hidden') && joinModal.classList.contains('hidden')) {
                    document.body.classList.remove('modal-open');
                }
            }

            function openModal(modal) {
                if (modal === createModal) {
                    joinModal.classList.add('hidden');
                } else if (modal === joinModal) {
                    createModal.classList.add('hidden');
                }
                modal.classList.remove('hidden');
                document.body.classList.add('modal-open');
            }

            if (openCreateBtn) {
                openCreateBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal(createModal);
                });
            }
            if (closeCreateBtn) {
                closeCreateBtn.addEventListener('click', function() {
                    closeModal(createModal);
                });
            }
            if (cancelCreateBtn) {
                cancelCreateBtn.addEventListener('click', function() {
                    closeModal(createModal);
                });
            }

            if (openJoinBtn) {
                openJoinBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    openModal(joinModal);
                });
            }
            if (closeJoinBtn) {
                closeJoinBtn.addEventListener('click', function() {
                    closeModal(joinModal);
                });
            }
            if (cancelJoinBtn) {
                cancelJoinBtn.addEventListener('click', function() {
                    closeModal(joinModal);
                });
            }


            window.addEventListener('click', function(e) {
                if (e.target === createModal) {
                    closeModal(createModal);
                }
                if (e.target === joinModal) {
                    closeModal(joinModal);
                }
            });

            window.addEventListener('load', function() {
                createModal.classList.add('hidden');
                joinModal.classList.add('hidden');
                document.body.classList.remove('modal-open');
            });
        })();
    </script>
@endsection
