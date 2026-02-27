<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\ColocationInvitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use App\Mail\ColocationInvite;

class ColocationController extends Controller
{
    public function show(Colocation $colocation): View
    {
        $members = $colocation->users;
        return view('pages.colocation',compact('colocation','members'));
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
            'owner_id' => auth()->id(),
            'join_token' => strtoupper(Str::random(6)),
        ]);

        auth()->user()->update([
            'colocation_id' => $colocation->id,
            'colocation_role' => 'owner',
        ]);
        return redirect()->route('colocations.show',$colocation);
    }

    public function joinWithInvitation($token)
    {
        $user = auth()->user();

        if ($user->colocation_id) {
            return back()->withErrors('You are already in a colocation.');
        }

        $invitation = ColocationInvitation::where('token', $token)
            ->whereNull('accepted_at')
            ->firstOrFail();

        if ($invitation->email !== $user->email) {
            return back()->withErrors('This invitation is not for your email.');
        }

        DB::transaction(function () use ($user, $invitation) {

            $this->attachUserToColocation(
                $user,
                $invitation->colocation_id
            );

            $invitation->delete();
        });

        return redirect()
            ->route('colocations.show', $invitation->colocation_id)
            ->with('success', 'Invitation accepted successfully!');
    }

    public function joinWithJoinToken(Request $request)
    {
        $request->validate([
            'token' => ['required', 'string']
        ]);

        $user = auth()->user();

        if ($user->colocation_id) {
            return back()->withErrors('You are already in a colocation.');
        }

        $colocation = Colocation::where('join_token', trim($request->token))
            ->first();

        if (!$colocation) {
            return back()->withErrors('Invalid join token.');
        }

        $this->attachUserToColocation($user, $colocation->id);

        return redirect()
            ->route('colocations.show', $colocation->id)
            ->with('success', 'You joined successfully!');
    }

    public function invite(Request $request)
    {
        $user = auth()->user();

        if ($user->colocation_role !== 'owner') {
            abort(403, 'Only the owner can send invitations.');
        }

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $colocation = $user->colocation;

        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser && $existingUser->colocation_id) {
            return back()->withErrors('This user is already in a colocation.');
        }

        $alreadyInvited = ColocationInvitation::where('email', $request->email)
            ->where('colocation_id', $colocation->id)
            ->whereNull('accepted_at')
            ->exists();

        if ($alreadyInvited) {
            return back()->withErrors('This email already has a pending invitation.');
        }

        DB::transaction(function () use ($request, $colocation) {

            $invitation = ColocationInvitation::create([
                'colocation_id' => $colocation->id,
                'email' => $request->email,
                'token' => Str::uuid()
            ]);

            Mail::to($request->email)
                ->send(new ColocationInvite($invitation));
        });

        return back()->with('success', 'Invitation sent successfully!');
    }

    private function attachUserToColocation($user, $colocationId)
    {
        $user->update([
            'colocation_id' => $colocationId,
            'colocation_role' => 'member',
        ]);
    }
}
