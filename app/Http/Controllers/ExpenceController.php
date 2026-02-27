<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Expense;

class ExpenceController extends Controller
{
    public function show(): View
    {
        $colocation = auth()->user()->colocation;

        $expenses = $colocation->expenses()
            ->with(['user', 'category'])
            ->latest()
            ->get();

        return view('pages.expences', compact('expenses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'expense_date' => 'required|date',
        ]);

        Expense::create([
            'colocation_id' => auth()->user()->colocation_id,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'amount' => $request->amount,
            'expense_date' => $request->expense_date,
        ]);

        return redirect()->route('expences.show')
            ->with('success', 'Expense added successfully!');
    }
}
