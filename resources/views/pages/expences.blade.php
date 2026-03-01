@extends('layouts.app')

@section('title', 'Expences')

@section('content')
    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

            <!-- header with title and add expense button (opens modal) -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Dépenses</h1>
                    <p class="text-slate-500 mt-1">Consultez et filtrez les dépenses de la colocation.</p>
                </div>
                <button id="openAddExpenseModalBtn"
                    class="cursor-pointer mt-4 sm:mt-0 bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-5 py-2.5 rounded-xl shadow-md shadow-indigo-200 transition flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Ajouter une dépense
                </button>
            </div>

            <!-- FILTER BAR: month filter + quick stats -->
            <div
                class="bg-white rounded-2xl border border-slate-200 shadow-sm p-4 mb-6 flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
                <div class="flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                        stroke="currentColor" class="w-5 h-5 text-indigo-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                    </svg>
                    <span class="text-sm font-medium text-slate-700">Filtrer par mois :</span>
                    <form method="GET" action="{{ route('expences.show') }}">
                        <select name="month" onchange="this.form.submit()">
                            <option value="">Tous les mois</option>

                            @foreach ($months as $m)
                                @php
                                    $value = $m->year . '-' . str_pad($m->month, 2, '0', STR_PAD_LEFT);
                                @endphp

                                <option value="{{ $value }}" {{ request('month') == $value ? 'selected' : '' }}>
                                    {{ \Carbon\Carbon::create()->month($m->month)->format('F') }}
                                    {{ $m->year }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="flex gap-4 text-sm">
                    <span class="text-slate-600">Total du mois : <span
                            class="font-semibold text-indigo-600">{{ $total }} MAD</span></span>
                    <span class="text-slate-300 hidden sm:inline">|</span>
                    <span class="text-slate-600">Dépenses ({{ $expenses->count() }})</span>
                </div>
            </div>

            <!-- EXPENSES LIST (cards style) -->
            <div class="space-y-3">
                @forelse ($expenses as $expense)
                    <div
                        class="bg-white rounded-xl border border-slate-200 p-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 hover:shadow-sm transition">

                        <div class="flex items-start gap-3">
                            <div>
                                <p class="font-medium text-slate-800">{{ $expense->title }}</p>

                                <div class="flex flex-wrap gap-x-3 gap-y-1 text-xs text-slate-500 mt-1">
                                    <span>{{ $expense->expense_date->format('d M Y') }}</span>
                                    <span>{{ $expense->category->name }}</span>
                                    <span>{{ $expense->user->name }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pl-13 sm:pl-0">

                            <span class="font-semibold text-lg text-slate-800">
                                {{ $expense->amount }} MAD
                            </span>

                            {{-- Delete Button --}}
                            @if ($expense->user_id === auth()->id())
                                <form method="POST" action="{{ route('expenses.destroy', $expense) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this expense?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            @endif

                        </div>
                    </div>
                @empty
                    <div class="text-center py-10 text-slate-400">Aucune dépense pour ce mois.</div>
                @endforelse
        </main>

        <!-- ========== MODAL: AJOUTER UNE DÉPENSE ========== -->
        <div id="addExpenseModal"
            class="fixed inset-0 bg-black/40 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
            <div class="bg-white rounded-2xl max-w-md w-full shadow-2xl border border-white/30">
                <div class="p-6">
                    <!-- header -->
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-6 h-6 text-indigo-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Ajouter une dépense
                        </h3>
                        <button id="closeAddModalBtn" class="text-slate-400 hover:text-slate-600 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <!-- formulaire d'ajout de dépense -->
                    <form id="addExpenseForm" class="space-y-4" action="{{ route('expences.store') }}" method="post">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Titre <span
                                    class="text-red-400">*</span></label>
                            <input type="text" name="title" placeholder="ex : Courses Carrefour" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                        </div>

                        <!-- montant -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Montant (MAD) <span
                                    class="text-red-400">*</span></label>
                            <input type="number" name="amount" step="0.01" placeholder="0.00" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                        </div>

                        <!-- catégorie (dropdown) -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Catégorie <span
                                    class="text-red-400">*</span></label>
                            <select name="category_id" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                                <option value="" disabled selected>Choisir une catégorie</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- date -->
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Date <span
                                    class="text-red-400">*</span></label>
                            <input type="date" name="expense_date" required
                                class="w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 focus:bg-white focus:ring-2 focus:ring-indigo-300 outline-none transition">
                        </div>

                        <!-- actions -->
                        <div class="flex gap-3 pt-3">
                            <button type="submit"
                                class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 px-4 rounded-xl shadow-sm transition">
                                Enregistrer
                            </button>
                            <button type="button" id="cancelAddModalBtn"
                                class="flex-1 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-medium py-2.5 px-4 rounded-xl transition">
                                Annuler
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            (function() {
                const openBtn = document.getElementById('openAddExpenseModalBtn');
                const modal = document.getElementById('addExpenseModal');
                const closeBtn = document.getElementById('closeAddModalBtn');
                const cancelBtn = document.getElementById('cancelAddModalBtn');
                const form = document.getElementById('addExpenseForm');

                // open modal
                openBtn.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                    document.body.classList.add('overflow-hidden');
                });

                // close functions
                function closeModal() {
                    modal.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }

                closeBtn.addEventListener('click', closeModal);
                cancelBtn.addEventListener('click', closeModal);

                // click outside backdrop to close
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });

                // ensure no overflow class on load
                window.addEventListener('load', function() {
                    if (!modal.classList.contains('hidden')) {
                        modal.classList.add('hidden');
                    }
                    document.body.classList.remove('overflow-hidden');
                });
            })();
        </script>
    @endsection
