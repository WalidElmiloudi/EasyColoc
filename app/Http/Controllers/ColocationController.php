<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreColocationRequest;
use App\Http\Requests\JoinColocationRequest;
use App\Http\Requests\InviteColocationRequest;
use App\Models\Colocation;
use App\Models\ColocationInvitation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Debt;
use App\Mail\ColocationInvite;

class ColocationController extends Controller
{
    public function show(Colocation $colocation): View
    {
        $members = $colocation->users;
        $categories = $colocation->categories;
        return view('pages.colocation', compact('colocation', 'members', 'categories'));
    }

    public function store(StoreColocationRequest $request)
    {
        $user = auth()->user();

        $joinToken = mt_rand(100000, 999999);

        $colocation = $user->colocation()->create([
            'name' => $request->name,
            'join_token' => $joinToken,
            'owner_id' => $user->id,
        ]);

        $user->update([
            'colocation_role' => 'owner',
            'colocation_id' => $colocation->id,
        ]);

        return redirect()->route('colocations.show', $colocation->id)
            ->with('success', 'Colocation created successfully!');
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

    public function joinWithJoinToken(JoinColocationRequest $request)
    {
        $user = auth()->user();

        if ($user->colocation_id) {
            return back()->withErrors('You are already in a colocation.');
        }

        $colocation = Colocation::where('join_token', $request->token)->firstOrFail();

        $user->update([
            'colocation_id' => $colocation->id,
            'colocation_role' => 'member',
        ]);

        return redirect()->route('colocations.show', $colocation->id)
            ->with('success', 'You have joined the colocation successfully!');
    }

    public function invite(InviteColocationRequest $request)
    {
        $user = auth()->user();
        $colocation = $user->colocation;

        $token = mt_rand(100000, 999999);

        $invitation = ColocationInvitation::create([
            'colocation_id' => $colocation->id,
            'email' => $request->email,
            'token' => $token,
        ]);

        Mail::to($request->email)->send(new \App\Mail\ColocationInvite($invitation));

        return back()->with('success', 'Invitation sent successfully!');
    }

    private function attachUserToColocation($user, $colocationId)
    {
        $user->update([
            'colocation_id' => $colocationId,
            'colocation_role' => 'member',
        ]);
    }

    public function leave()
    {
        $user = auth()->user();

        if (!$user->colocation_id) {
            return back()->with('error', 'You are not in a colocation.');
        }

        if ($user->id === $user->colocation->owner_id) {
            return back()->with('error', 'Owner must transfer ownership before leaving.');
        }

        $colocationId = $user->colocation_id;

        $hasUnpaidDebts = Debt::where('colocation_id', $colocationId)
            ->where(function ($query) use ($user) {
                $query->where('from_user_id', $user->id)
                    ->orWhere('to_user_id', $user->id);
            })
            ->where('is_paid', false)
            ->exists();

        if ($hasUnpaidDebts) {
            $user->decrement('reputation');
        } else {
            $user->increment('reputation');
        }

        foreach ($user->expenses as $expense) {
            $expense->debts()->delete();
            $expense->delete();
        }

        $user->update([
            'colocation_id' => null,
            'colocation_role' => null
        ]);

        return redirect()->route('home')->with('success', 'You left the colocation.');
    }

    public function removeMember($memberId)
    {
        $member = User::findOrFail($memberId);
        $owner = auth()->user();
        $colocation = $owner->colocation;

        if ($owner->id !== $colocation->owner_id) {
            abort(403, 'Only the owner can remove members.');
        }

        if ($member->id === $owner->id) {
            return back()->with('error', 'Owner cannot remove themselves.');
        }

        DB::transaction(function () use ($colocation, $member, $owner) {
            Debt::where('colocation_id', $colocation->id)
                ->where('is_paid', false)
                ->where(function ($q) use ($member) {
                    $q->where('from_user_id', $member->id)
                        ->orWhere('to_user_id', $member->id);
                })
                ->get()
                ->each(function ($debt) use ($member, $owner) {
                    if ($debt->from_user_id === $member->id) $debt->from_user_id = $owner->id;
                    if ($debt->to_user_id === $member->id) $debt->to_user_id = $owner->id;
                    $debt->save();
                });

            foreach ($member->expenses as $expense) {
                $expense->debts()->delete();
                $expense->delete();
            }

            $member->update([
                'colocation_id' => null,
                'colocation_role' => null,
            ]);
        });

        return back()->with('success', "{$member->name} has been removed and debts reassigned to the owner.");
    }

    public function transferOwnership(User $user)
    {
        $owner = auth()->user();
        $colocation = $owner->colocation;

        if ($owner->id !== $colocation->owner_id) {
            abort(403, 'Only the owner can transfer ownership.');
        }

        if ($user->id === $owner->id) {
            return back()->with('error', 'You are already the owner.');
        }

        $colocation->update(['owner_id' => $user->id]);
        $user->update(['colocation_role' => 'owner']);
        auth()->user()->update(['colocation_role' => 'member']);

        return back()->with('success', "{$user->name} is now the owner of the colocation.");
    }

    public function cancelColocation()
    {
        $owner = auth()->user();
        $colocation = $owner->colocation;

        if (!$colocation || $owner->id !== $colocation->owner_id) {
            abort(403, 'Only the owner can cancel the colocation.');
        }

        DB::transaction(function () use ($colocation) {

            foreach ($colocation->users as $member) {
                $member->forceFill([
                    'colocation_id' => null,
                    'colocation_role' => null,
                ])->save();
            }

            $colocation->delete();
        });

        return redirect()->route('home')
            ->with('success', 'The colocation has been canceled and all members have been removed.');
    }
}
