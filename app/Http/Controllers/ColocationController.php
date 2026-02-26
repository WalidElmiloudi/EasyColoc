<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\ColocationInvitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ColocationController extends Controller
{
    public function show(Colocation $colocation): View
    {
        return view('pages.colocation',compact('colocation'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        if (auth()->user()->colocation()->exists()) {
            return back()->withErrors('You are already in a colocation.');
        }

        $colocation = Colocation::create([
            'name' => $request->name,
            'owner_id' => auth()->id()
        ]);

        auth()->user()->update([
            'colocation_id' => $colocation->id,
            'colocation_role' => 'owner',
        ]);
        return redirect()->route('colocations.show',$colocation);
    }

    public function joinByToken($token)
    {
        $invitation = ColocationInvitation::where('token', $token)
                                      ->whereNull('accepted_at')
                                      ->firstOrFail();

        $user = auth()->user();

        if ($user->colocation_id) {
            return back()->withErrors('You are already in a colocation.');
        }

        $user->update([
            'colocation_id' => $invitation->colocation_id,
            'role' => 'member',
        ]);

        $invitation->update(['accepted_at' => now()]);

        return redirect()->route('colocations.show', $user->colocation_id)
                     ->with('success', 'You have joined the colocation!');
    }

    public function invite(Request $request)
    {
        $request->validate(['email' => 'required|email|unique:colocation_invitations,email']);

        $user = auth()->user();
        $colocation = $user->colocation;

        $token = mt_rand(100000, 999999);

        $invitation = ColocationInvitation::create([
            'colocation_id' => $colocation->id,
            'email' => $request->email,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new \App\Mail\ColocationInvite($invitation));

        return back()->with('success', 'Invitation sent!');
    }
}
