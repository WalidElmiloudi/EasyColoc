<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debt;

class DebtController extends Controller
{
    public function show()
    {
        $colocation = auth()->user()->colocation;

        $debts = $colocation->debts()->where('is_paid', false)->get();

        return view('pages.debt', compact('debts'));
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
