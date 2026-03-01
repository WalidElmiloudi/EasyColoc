<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

class DebtController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $colocation = auth()->user()->colocation;

        $debts = $colocation->debts()->where('is_paid', false)->get();

        $totalOwedToMe = Debt::where('colocation_id', $colocation->id)
            ->where('to_user_id', $user->id)
            ->where('is_paid', false)
            ->sum('amount');

        $totalIOwe = Debt::where('colocation_id', $colocation->id)
            ->where('from_user_id', $user->id)
            ->where('is_paid', false)
            ->sum('amount');

        $balance = $totalOwedToMe - $totalIOwe;


        return view('pages.debt', compact('debts', 'balance'));
    }

    public function markAsPaid(Debt $debt)
    {
        if ($debt->to_user_id === auth()->id()) {
            abort(403);
        }

        $debt->update([
            'is_paid' => true,
        ]);

        return back()->with('success', 'Debt marked as paid!');
    }
}
