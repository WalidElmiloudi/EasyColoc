@extends('layouts.app')

@section('title', 'Expences')

@section('content')

    <!-- ========== MAIN CONTENT: EXPENSES PAGE ========== -->
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- header with colocation name and expense summary -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Dépenses · Coloc’ Montreuil</h1>
                    <p class="text-slate-500 mt-1">Ajoute une dépense, visualise les soldes et marque les dettes comme
                        payées.</p>
                </div>
                <!-- quick balance pill for current user -->
                <div
                    class="mt-4 sm:mt-0 bg-white rounded-full border border-slate-200 shadow-sm px-5 py-2.5 flex items-center gap-3">
                    <span class="text-sm text-slate-600">Ton solde:</span>
                    <span class="font-semibold text-emerald-600">+ 24,50 €</span>
                    <span class="text-xs text-slate-400">(on te doit)</span>
                </div>
            </div>

            <!-- two column layout: left (add expense + history) , right (who owes whom + i owe) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT LARGE COLUMN: ADD EXPENSE FORM + EXPENSE HISTORY -->
                <div class="lg:col-span-2 space-y-8">

                    <!-- CARD: AJOUTER UNE DÉPENSE -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Ajouter une dépense
                        </h2>

                        <form class="space-y-4">
                            <!-- description -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Description</label>
                                <input type="text" placeholder="ex: Courses Auchan, facture EDF..."
                                    class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                            </div>

                            <!-- montant et catégorie (row) -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Montant (€)</label>
                                    <input type="number" step="0.01" placeholder="45.90"
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Catégorie</label>
                                    <select
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                                        <option>Courses</option>
                                        <option>Loyer</option>
                                        <option>Électricité</option>
                                        <option>Internet</option>
                                        <option>Autre</option>
                                    </select>
                                </div>
                            </div>

                            <!-- payé par (select membre) et répartition (equal / personnalisé) -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Payé par</label>
                                    <select
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                                        <option value="1">Alex (moi)</option>
                                        <option value="2">Clara</option>
                                        <option value="3">Julien</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Répartition</label>
                                    <select
                                        class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                                        <option>Équitable (3 parts)</option>
                                        <option>Personnalisée</option>
                                    </select>
                                </div>
                            </div>

                            <!-- petits toggles pour inclus/exclure (simplifié) -->
                            <div class="bg-slate-50 p-3 rounded-xl border border-slate-200">
                                <p class="text-xs font-medium text-slate-500 mb-2">Concerne :</p>
                                <div class="flex flex-wrap gap-4">
                                    <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox"
                                            checked> Alex</label>
                                    <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox"
                                            checked> Clara</label>
                                    <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox"
                                            checked> Julien</label>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 rounded-xl shadow-md shadow-indigo-100 transition flex items-center justify-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Enregistrer la dépense
                            </button>
                        </form>
                    </div>

                    <!-- CARD: HISTORIQUE DES DÉPENSES (récentes) -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                            </svg>
                            Dernières dépenses
                        </h2>

                        <div class="space-y-3">
                            <!-- item 1 -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <div>
                                        <p class="font-medium text-slate-800">Courses Auchan</p>
                                        <p class="text-xs text-slate-500">par Clara · 12/04/2025</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-slate-800">56,80 €</p>
                                    <p class="text-xs text-emerald-600">remboursée</p>
                                </div>
                            </div>
                            <!-- item 2 -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs font-bold">
                                        A</div>
                                    <div>
                                        <p class="font-medium text-slate-800">Facture EDF</p>
                                        <p class="text-xs text-slate-500">par Alex · 10/04/2025</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-slate-800">120,30 €</p>
                                    <p class="text-xs text-amber-600">en attente</p>
                                </div>
                            </div>
                            <!-- item 3 -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        J</div>
                                    <div>
                                        <p class="font-medium text-slate-800">Loyer avril</p>
                                        <p class="text-xs text-slate-500">par Julien · 05/04/2025</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-slate-800">400,00 €</p>
                                    <p class="text-xs text-emerald-600">remboursée</p>
                                </div>
                            </div>
                        </div>
                        <button
                            class="w-full mt-4 text-sm text-indigo-600 hover:text-indigo-800 font-medium flex items-center justify-center gap-1">
                            Voir toutes les dépenses
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- RIGHT COLUMN: BALANCES + "WHO OWES WHOM" + "I OWE" -->
                <div class="lg:col-span-1 space-y-8">

                    <!-- CARD: QUI DOIT QUOI ? (balance entre membres) -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12h-15m0 0 6.75 6.75M4.5 12l6.75-6.75" />
                            </svg>
                            Qui doit quoi ?
                        </h2>

                        <div class="space-y-4">
                            <!-- ligne Clara doit à Alex -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <span class="text-sm font-medium">Clara</span>
                                    <span class="text-xs text-slate-400">doit à</span>
                                    <div
                                        class="w-6 h-6 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                        A</div>
                                    <span class="text-sm font-medium">Alex</span>
                                </div>
                                <span class="font-semibold text-amber-600">18,90 €</span>
                            </div>
                            <!-- ligne Julien doit à Alex -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                        J</div>
                                    <span class="text-sm font-medium">Julien</span>
                                    <span class="text-xs text-slate-400">doit à</span>
                                    <div
                                        class="w-6 h-6 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                        A</div>
                                    <span class="text-sm font-medium">Alex</span>
                                </div>
                                <span class="font-semibold text-amber-600">5,60 €</span>
                            </div>
                            <!-- ligne Alex doit à Clara (exemple) -->
                            <div
                                class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                        A</div>
                                    <span class="text-sm font-medium">Alex</span>
                                    <span class="text-xs text-slate-400">doit à</span>
                                    <div
                                        class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <span class="text-sm font-medium">Clara</span>
                                </div>
                                <span class="font-semibold text-amber-600">12,00 €</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 mt-4 text-center">Soldes calculés automatiquement</p>
                    </div>

                    <!-- CARD: CE QUE JE DOIS (I OWE) avec boutons marquer payé -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15" />
                            </svg>
                            Ce que je dois
                        </h2>

                        <!-- si je ne dois rien -->
                        <!-- <p class="text-sm text-slate-500 text-center py-4">Tu ne dois rien pour le moment ✅</p> -->

                        <!-- liste de dettes (actives) -->
                        <div class="space-y-3">
                            <!-- dette à Clara -->
                            <div
                                class="flex items-center justify-between p-3 bg-amber-50/50 rounded-xl border border-amber-200">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <div>
                                        <p class="font-medium text-sm">Clara Martin</p>
                                        <p class="text-xs text-slate-500">Courses</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-amber-700">12,00 €</p>
                                    <button
                                        class="text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg mt-1 transition flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        marquer payé
                                    </button>
                                </div>
                            </div>
                            <!-- dette à Julien -->
                            <div
                                class="flex items-center justify-between p-3 bg-amber-50/50 rounded-xl border border-amber-200">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                        J</div>
                                    <div>
                                        <p class="font-medium text-sm">Julien Petit</p>
                                        <p class="text-xs text-slate-500">Loyer part</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-amber-700">33,33 €</p>
                                    <button
                                        class="text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-lg mt-1 transition flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        marquer payé
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- message si rien -->
                        <!-- <p class="text-xs text-slate-400 text-center mt-3">Toutes tes dettes sont réglées.</p> -->
                    </div>

                    <!-- CARD: CE QUE L'ON ME DOIT (facultatif, mais symétrique) -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-sm font-semibold text-slate-800 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="w-4 h-4 text-indigo-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                            </svg>
                            On me doit
                        </h2>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-600">Clara</span>
                                <span class="font-medium text-emerald-600">18,90 €</span>
                            </div>
                            <div class="flex items-center justify-between text-sm">
                                <span class="text-slate-600">Julien</span>
                                <span class="font-medium text-emerald-600">5,60 €</span>
                            </div>
                        </div>
                        <p class="text-xs text-slate-400 mt-3">Total dû : <span
                                class="font-semibold text-emerald-600">24,50 €</span></p>
                    </div>
                </div>
            </div>

            <!-- petit rappel : les dépenses sont équilibrées automatiquement -->
            <div
                class="mt-8 bg-indigo-50/50 rounded-xl border border-indigo-100 p-4 text-sm text-slate-600 flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-5 h-5 text-indigo-500">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09Z" />
                </svg>
                <span>Les soldes sont automatiques. Clique sur "marquer payé" une fois que tu as remboursé quelqu'un.</span>
            </div>
        </main>
    </div>
@endsection
