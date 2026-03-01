<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Expense;

class ExpenceController extends Controller
{

    public function show(Request $request): View
    {
        $colocation = auth()->user()->colocation;

        $categories = $colocation->categories;

        $query = $colocation->expenses()
            ->with(['user', 'category']);

        // 🔎 Filter by month if selected
        if ($request->filled('month')) {
            $date = Carbon::createFromFormat('Y-m', $request->month);

            $query->whereYear('expense_date', $date->year)
                  ->whereMonth('expense_date', $date->month);
        }

        $expenses = $query->latest()->get();

        $months = $colocation->expenses()
            ->select(
                DB::raw("EXTRACT(YEAR FROM expense_date)::int as year"),
                DB::raw("EXTRACT(MONTH FROM expense_date)::int as month")
        )
        ->distinct()
        ->orderByDesc('year')
        ->orderByDesc('month')
        ->get();

        $total = $expenses->sum('amount');

        return view('pages.expences', compact('expenses', 'categories', 'months','total'));
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
