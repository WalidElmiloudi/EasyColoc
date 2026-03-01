@extends('layouts.app')

@section('title', 'Expences')

@section('content')
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')

        <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Dettes · Coloc’ Montreuil</h1>
                    <p class="text-slate-500 mt-1">Qui doit quoi ? Visualise et marque les remboursements.</p>
                </div>
                <div
                    class="mt-4 sm:mt-0 bg-white rounded-full border border-slate-200 shadow-sm px-5 py-2.5 flex items-center gap-3">
                    <span class="text-sm text-slate-600">Ton solde:</span>
                    <span class="font-semibold text-emerald-600">+ 24,50 €</span>
                    <span class="text-xs text-slate-400">(on te doit)</span>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- LEFT COLUMN (span 2): GLOBAL DEBT MATRIX / WHO OWES WHOM -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-5 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12h-15m0 0 6.75-6.75M4.5 12l6.75 6.75" />
                            </svg>
                            Qui doit à qui ?
                        </h2>

                        <!-- Tableau récapitulatif des dettes croisées -->
                        <div class="space-y-4">
                            <!-- dette 1 : Clara doit à Alex -->
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3 flex-wrap">
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                            C</div>
                                        <span class="font-medium text-slate-800">Clara</span>
                                    </div>
                                    <span class="text-slate-400 text-sm">doit à</span>
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                            A</div>
                                        <span class="font-medium text-slate-800">Alex</span>
                                    </div>
                                    <span class="text-sm font-semibold text-amber-600 ml-2">18,90 €</span>
                                </div>
                                <div class="text-xs text-slate-400">(courses)</div>
                            </div>

                            <!-- dette 2 : Julien doit à Alex -->
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3 flex-wrap">
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                            J</div>
                                        <span class="font-medium text-slate-800">Julien</span>
                                    </div>
                                    <span class="text-slate-400 text-sm">doit à</span>
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                            A</div>
                                        <span class="font-medium text-slate-800">Alex</span>
                                    </div>
                                    <span class="text-sm font-semibold text-amber-600 ml-2">5,60 €</span>
                                </div>
                                <div class="text-xs text-slate-400">(électricité)</div>
                            </div>

                            <!-- dette 3 : Alex doit à Clara -->
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3 flex-wrap">
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-indigo-200 text-indigo-700 flex items-center justify-center text-xs font-bold">
                                            A</div>
                                        <span class="font-medium text-slate-800">Alex</span>
                                    </div>
                                    <span class="text-slate-400 text-sm">doit à</span>
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                            C</div>
                                        <span class="font-medium text-slate-800">Clara</span>
                                    </div>
                                    <span class="text-sm font-semibold text-amber-600 ml-2">12,00 €</span>
                                </div>
                                <div class="text-xs text-slate-400">(loyer)</div>
                            </div>

                            <!-- dette 4 : Clara doit à Julien (exemple) -->
                            <div
                                class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                                <div class="flex items-center gap-3 flex-wrap">
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                            C</div>
                                        <span class="font-medium text-slate-800">Clara</span>
                                    </div>
                                    <span class="text-slate-400 text-sm">doit à</span>
                                    <div class="flex items-center gap-1">
                                        <div
                                            class="w-7 h-7 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                            J</div>
                                        <span class="font-medium text-slate-800">Julien</span>
                                    </div>
                                    <span class="text-sm font-semibold text-amber-600 ml-2">9,30 €</span>
                                </div>
                                <div class="text-xs text-slate-400">(internet)</div>
                            </div>
                        </div>

                        <!-- note explicative -->
                        <p class="text-xs text-slate-400 mt-5 text-center border-t border-slate-100 pt-4">
                            Les dettes sont calculées automatiquement en fonction des dépenses.
                        </p>
                    </div>
                </div>

                <!-- RIGHT COLUMN: "ON ME DOIT" + actions pour marquer payé -->
                <div class="lg:col-span-1 space-y-6">

                    <!-- CARD: CE QUE L'ON ME DOIT (avec boutons) -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-lg font-semibold text-slate-800 mb-4 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15" />
                            </svg>
                            On me doit
                        </h2>

                        <!-- Liste des personnes qui me doivent (avec montant et bouton "marquer payé") -->
                        <div class="space-y-4">
                            <!-- Clara doit à Alex -->
                            <div
                                class="flex items-center justify-between p-3 bg-emerald-50/50 rounded-xl border border-emerald-200">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <div>
                                        <p class="font-medium text-sm text-slate-800">Clara Martin</p>
                                        <p class="text-xs text-slate-500">courses</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-emerald-700">18,90 €</p>
                                    <button
                                        class="mt-1 text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-lg transition flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        marquer payé
                                    </button>
                                </div>
                            </div>

                            <!-- Julien doit à Alex -->
                            <div
                                class="flex items-center justify-between p-3 bg-emerald-50/50 rounded-xl border border-emerald-200">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-xs font-bold">
                                        J</div>
                                    <div>
                                        <p class="font-medium text-sm text-slate-800">Julien Petit</p>
                                        <p class="text-xs text-slate-500">électricité</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-semibold text-emerald-700">5,60 €</p>
                                    <button
                                        class="mt-1 text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-lg transition flex items-center gap-1">
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

                        <!-- total dû -->
                        <div class="border-t border-slate-200 mt-4 pt-4 flex justify-between items-center">
                            <span class="text-sm text-slate-600">Total à recevoir</span>
                            <span class="font-bold text-emerald-600">24,50 €</span>
                        </div>
                    </div>

                    <!-- CARD RÉCAP : CE QUE JE DOIS (pour information) -->
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                        <h2 class="text-md font-semibold text-slate-800 mb-3 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.8" stroke="currentColor" class="w-4 h-4 text-indigo-400">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 12h-15m0 0 6.75-6.75M4.5 12l6.75 6.75" />
                            </svg>
                            Ce que je dois
                        </h2>
                        <div class="space-y-2">
                            <!-- je dois à Clara -->
                            <div class="flex items-center justify-between text-sm">
                                <div class="flex items-center gap-2">
                                    <div
                                        class="w-6 h-6 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs font-bold">
                                        C</div>
                                    <span>Clara</span>
                                </div>
                                <span class="font-medium text-amber-600">12,00 €</span>
                            </div>
                            <!-- (rien d'autre pour l'exemple) -->
                        </div>
                        <p class="text-xs text-slate-400 mt-3">Les dettes que tu dois sont listées ici. Rembourse et
                            demande à l'autre de marquer "payé".</p>
                    </div>

                    <!-- petit rappel -->
                    <div
                        class="bg-indigo-50/50 rounded-xl border border-indigo-100 p-4 text-xs text-indigo-700 flex items-start gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-4 h-4 mt-0.5 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                        <span>Quand quelqu'un te rembourse, clique sur "marquer payé" pour solder la dette.</span>
                    </div>
                </div>
            </div>

            <!-- SECTION FACULTATIVE : HISTORIQUE DES PAIEMENTS RÉCENTS (pour info) -->
            <div class="mt-8 bg-white rounded-2xl border border-slate-200 shadow-sm p-6">
                <h3 class="font-semibold text-slate-800 mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5 text-indigo-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                    </svg>
                    Derniers remboursements
                </h3>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center p-2 bg-slate-50 rounded-lg">
                        <span class="text-slate-600"><span class="font-medium">Clara</span> t'a remboursé · 18,90 €</span>
                        <span class="text-xs text-slate-400">12/04/2025</span>
                    </div>
                    <div class="flex justify-between items-center p-2 bg-slate-50 rounded-lg">
                        <span class="text-slate-600">Tu as remboursé <span class="font-medium">Julien</span> · 5,60
                            €</span>
                        <span class="text-xs text-slate-400">10/04/2025</span>
                    </div>
                </div>
            </div>
        </main>
    @endsection
