<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Expense;
use App\Models\Debt;

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

        return view('pages.expences', compact('expenses', 'categories', 'months', 'total'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $colocation = $user->colocation;

        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0.01',
            'category_id' => 'required|exists:categories,id',
            'expense_date' => 'required|date',
        ]);

        $expense = Expense::create([
            'title' => $request->title,
            'amount' => $request->amount,
            'user_id' => $user->id,
            'colocation_id' => $colocation->id,
            'category_id' => $request->category_id,
            'expense_date' => $request->expense_date,
        ]);

        $members = $colocation->users()->where('id', '!=', $user->id)->get();
        $share = $expense->amount / $colocation->users()->count();

        foreach ($members as $member) {
            Debt::create([
                'expense_id' => $expense->id,
                'from_user_id' => $member->id,
                'to_user_id' => $user->id,
                'colocation_id' => $colocation->id,
                'amount' => $share,
            ]);
        }

        return back()->with('success', 'Expense created and debts generated!');
    }

    public function destroy(Expense $expense)
    {
        if ($expense->user_id !== auth()->id()) {
            abort(403);
        }

        $expense->delete();

        return back()->with('success', 'Expense deleted successfully.');
    }
}
