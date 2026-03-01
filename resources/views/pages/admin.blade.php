@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

    <div class="flex h-screen overflow-hidden">
        @include('partials.sidebar')
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
                            <p class="text-2xl font-bold text-slate-800">{{ $totalUsers }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- card 2: active colocations -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-500">Colocations actives</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $totalColocations }}</p>
                        </div>
                        <div
                            class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- card 4: utilisateurs bannis -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-slate-500">Utilisateurs bannis</p>
                            <p class="text-2xl font-bold text-slate-800">{{ $bannedUsers }}</p>
                        </div>
                        <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8"
                                stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                        </div>
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
                                <th class="px-6 py-4 font-semibold">Reputation</th>
                                <th class="px-6 py-4 font-semibold">Statut</th>
                                <th class="px-6 py-4 font-semibold">Inscrit le</th>
                                <th class="px-6 py-4 font-semibold text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 max-h-100 overflow-auto [scrollbar-width:none]">
                            @foreach ($users as $user)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            <span class="font-medium text-slate-800">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600">{{ $user->name }}</td>
                                    @if ($user->reputation >= 0)
                                        <td class="px-6 py-4">{{ $user->reputation }}</td>
                                    @else
                                        <td class="px-6 py-4 text-red-500">{{ $user->reputation }}</td>
                                    @endif
                                    <td class="px-6 py-4">
                                        @if ($user->status === 'active')
                                            <span
                                                class="bg-emerald-100 text-emerald-700 text-xs font-medium px-3 py-1 rounded-full">{{ $user->status }}</span>
                                        @else
                                            <span
                                                class="bg-amber-100 text-red-700 text-xs font-medium px-3 py-1 rounded-full">{{ $user->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-slate-500">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <form method="POST" action="{{ route('admin.users.ban', $user) }}"
                                                onsubmit="return confirm('Are you sure you want to {{ $user->status === 'active' ? 'banner' : 'activer' }} {{ $user->name }}?');">
                                                @csrf
                                                <button type="submit"
                                                    class="cursor-pointer p-1.5 transition
                   {{ $user->status === 'active' ? 'text-slate-400 hover:text-red-500' : 'text-green-600 hover:text-green-700' }}"
                                                    title="{{ $user->status === 'active' ? 'Ban' : 'Unban' }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        @if ($user->status === 'active')
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                                                        @else
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M5 13l4 4L19 7" />
                                                        @endif
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
@endsection
