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
                    @if ($balance > 0)
                        <p class="tfont-semibold text-emerald-600">
                            + {{ number_format($balance, 2) }} MAD
                        </p>
                    @elseif ($balance < 0)
                        <p class="font-semibold text-red-600">
                            - {{ number_format(abs($balance), 2) }} MAD
                        </p>
                    @else
                        <p class="font-semibold text-gray-600">
                            0.00 MAD
                        </p>
                    @endif
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
                            @foreach ($debts as $debt)
                                <div
                                    class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200 w-150">
                                    <div class="flex items-center gap-3 flex-wrap">
                                        <div class="flex items-center gap-1">
                                            <span class="font-medium text-slate-800">{{ $debt->fromUser->name }}</span>
                                        </div>
                                        <span class="text-slate-400 text-sm">doit à</span>
                                        <div class="flex items-center gap-1">
                                            <span class="font-medium text-slate-800">{{ $debt->toUser->name }}</span>
                                        </div>
                                        <span
                                            class="text-sm font-semibold text-amber-600 ml-2">{{ number_format($debt->amount, 2) }}
                                            MAD</span>
                                    </div>
                                </div>
                            @endforeach
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
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-indigo-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15" />
                                </svg>
                                On me doit
                            </h2>

                            <!-- Liste des personnes qui me doivent (avec montant et bouton "marquer payé") -->
                            <div class="space-y-4">
                                @foreach ($debts as $debt)
                                    @if ($debt->fromUser->id === auth()->user()->id)
                                        <div
                                            class="flex items-center justify-between p-3 bg-emerald-50/50 rounded-xl border border-emerald-200">
                                            <div class="flex items-center gap-3">
                                                <div>
                                                    <p class="font-medium text-sm text-slate-800">{{ $debt->toUser->name }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <p class="font-semibold text-emerald-700">
                                                    {{ number_format($debt->amount, 2) }} MAD</p>
                                                <form method="POST" action="{{ route('debts.pay', $debt) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit"
                                                        class="cursor-pointer mt-1 text-xs bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-lg transition flex items-center gap-1">

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                            class="w-3 h-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m4.5 12.75 6 6 9-13.5" />
                                                        </svg>

                                                        Marquer payé
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
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
        </main>
    @endsection
