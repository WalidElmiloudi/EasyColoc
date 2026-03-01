<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Colocation;

class AdminController extends Controller
{
    public function show(): View
    {
        $users = User::where('role', '!=', 'admin')->get();
        $totalUsers = User::count();
        $totalColocations = Colocation::count();
        $bannedUsers = User::where('status', 'banned')->count();
        return view('pages.admin', compact('users', 'totalUsers', 'totalColocations', 'bannedUsers'));
    }

    public function toggleBan(User $user)
    {
        $admin = auth()->user();

        if ($admin->role !== 'admin') {
            abort(403, 'Only admins can perform this action.');
        }

        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot ban or unban another admin.');
        }

        $user->update([
            'status' => $user->status === 'active' ? 'banned' : 'active',
        ]);

        $action = $user->status === 'banned' ? 'banned' : 'unbanned';

        return back()->with('success', "{$user->name} has been {$action}.");
    }
}
