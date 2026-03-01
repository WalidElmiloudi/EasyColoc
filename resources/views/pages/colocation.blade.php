@extends('layouts.app')

@section('title', 'Colocation')

@section('content')
    <!-- ========== TOP NAVIGATION ========== -->

    <div class="flex h-screen overflow-hidden">

        @include('partials.sidebar')
        <!-- ========== MAIN CONTENT: COLOCATION MANAGEMENT ========== -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- colocation header with name and owner badge -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <div class="flex items-center gap-2">
                        <h1 class="text-3xl font-bold text-slate-800">Coloc’{{ $colocation->name }}</h1>
                        <span
                            class="bg-amber-100 text-amber-700 text-xs font-semibold px-3 py-1 rounded-full border border-amber-200">propriétaire</span>
                    </div>
                    <p class="text-slate-500 mt-1">Gère la colocation, les membres, les catégories de dépenses et les
                        invitations.</p>
                </div>
                <!-- quick token display + copy -->
                <div class="mt-4 sm:mt-0 flex items-center gap-2 bg-indigo-50 p-2 rounded-xl border border-indigo-200">
                    <span
                        class="text-xs font-mono bg-white px-3 py-2 rounded-lg border border-indigo-100 text-indigo-800">{{ $colocation->join_token }}</span>
                </div>
            </div>

            <!-- two column layout: left (categories & invite), right (members) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT LARGE COLUMN: CATEGORIES + INVITATION -->
                @if ($colocation->owner_id === auth()->user()->id)
                    <div class="lg:col-span-2 space-y-8">

                        <!-- CARD: CATÉGORIES DE DÉPENSES -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                </svg>
                                Catégories de dépenses
                            </h2>
                            <p class="text-sm text-slate-500 mb-4">Définis les catégories qui seront utilisées pour les
                                dépenses
                                (ex: courses, loyer, électricité…).</p>

                            <!-- liste des catégories existantes -->
                            <div class="space-y-2 mb-5 max-h-50 overflow-auto [scrollbar-width:none]">
                                @forelse ($categories as $category)
                                    <div
                                        class="flex items-center justify-between bg-slate-50 p-3 rounded-xl border border-slate-200">
                                        <div class="flex items-center gap-3">
                                            <span class="font-medium text-slate-700">{{ $category->name }}</span>
                                        </div>
                                        <a href="{{ route('categories.destroy',$category->id) }}">
                                            <button class="text-slate-400 hover:text-red-500 transition cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </a>
                                    </div>
                                @empty
                                    <div class="text-center text-slate-400 py-4">
                                        No categories found.
                                    </div>
                                @endforelse
                            </div>

                            <!-- formulaire pour ajouter une nouvelle catégorie -->
                            <form action="{{ route('categories.store') }}" method="post">
                                @csrf
                                <div class="flex gap-2">
                                    <input type="text" name="name" placeholder="Nouvelle catégorie (ex: Internet)"
                                        class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition text-sm">
                                    <button type="submit"
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm font-medium shadow-sm transition flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                        Ajouter
                                    </button>
                                </div>
                            </form>
                            <p class="text-xs text-slate-400 mt-2">Les membres pourront utiliser ces catégories lors de
                                l'ajout
                                d'une dépense.</p>
                        </div>

                        <!-- CARD: INVITER DES MEMBRES (token + envoi) -->
                        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                            <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>
                                Inviter des colocataires
                            </h2>
                            <p class="text-sm text-slate-500 mb-4">Envoie le token ou copie-le pour inviter d'autres
                                personnes.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-3 items-start sm:items-center mb-4">
                                <!-- Token display -->
                                <div id="joinToken"
                                    class="bg-slate-100 px-4 py-3 rounded-xl border border-slate-200 font-mono text-sm w-full sm:w-auto flex-1">
                                    {{ $colocation->join_token }}
                                </div>

                                <!-- Copy button -->
                                <button type="button" onclick="copyToken()"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl text-sm font-medium shadow-sm transition flex items-center gap-2 whitespace-nowrap">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 0 1-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 0 1 1.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 0 0-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 0 1-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H9.75" />
                                    </svg>
                                    Copier le token
                                </button>
                            </div>

                            <!-- envoi par email (simulé) -->
                            <div class="border-t border-slate-200 pt-4">
                                @if ($errors->any())
                                    <div class="mb-4 rounded-lg bg-red-100 p-3 text-red-700 text-sm">
                                        <ul class="list-disc list-inside">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ route('colocations.invite') }}" method="POST">
                                    @csrf
                                    <label class="block text-sm font-medium text-slate-700 mb-2">Ou envoie une invitation
                                        par
                                        e-mail</label>
                                    <div class="flex gap-2">
                                        <input type="email" name="email" placeholder="coloc@exemple.fr"
                                            class="flex-1 px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition text-sm">
                                        <button type="submit"
                                            class="bg-white border border-indigo-300 hover:bg-indigo-50 text-indigo-700 px-5 py-2.5 rounded-xl text-sm font-medium transition">Envoyer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- RIGHT COLUMN: MEMBRES DE LA COLOCATION (avec actions propriétaire) -->
                @if ($colocation->owner_id === auth()->user()->id)
                    <div class="lg:col-span-1">
                    @else
                        <div class="lg:col-span-4 ">
                @endif
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 h-128">
                    <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                            stroke="currentColor" class="w-5 h-5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        Membres ({{ $members->count() }})
                    </h2>
                    <div class="h-[90%] overflow-auto [scrollbar-width:none]">
                        <!-- liste des membres avec rôles et actions -->
                        <ul class="space-y-3">
                            @foreach ($members as $member)
                                @if ($member->colocation_role === 'owner')
                                    <!-- proprio (Alex) -->
                                    <li
                                        class="flex items-center justify-between p-3 bg-indigo-50/50 rounded-xl border border-indigo-200">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center font-semibold text-xs">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-800">{{ $member->name }}</p>
                                                <p class="text-xs text-indigo-600">propriétaire</p>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li
                                        class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                        <div class="flex items-center gap-3">
                                            <div
                                                class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-semibold text-xs">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <div>
                                                <p class="font-medium text-slate-800">{{ $member->name }}</p>
                                                <p class="text-xs text-slate-500">{{ $member->colocation_role }}</p>
                                            </div>
                                        </div>
                                        <div class="flex gap-1">
                                            @if (auth()->user()->colocation_role === 'owner')
                                                <button class="p-1.5 text-slate-400 hover:text-amber-600 transition"
                                                    title="Passer propriétaire">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                                    </svg>
                                                </button>
                                                <button class="p-1.5 text-slate-400 hover:text-red-500 transition"
                                                    title="Retirer de la coloc">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
    </div>

    </main>
    </div>
    <script>
        function copyToken() {
            const tokenDiv = document.getElementById('joinToken');
            const token = tokenDiv.textContent.trim();

            navigator.clipboard.writeText(token)
                .then(() => {
                    // Optional: temporary feedback
                    console.log('Token copied to clipboard!');
                })
                .catch(err => {
                    console.error('Failed to copy token:', err);
                });
        }
    </script>
@endsection
