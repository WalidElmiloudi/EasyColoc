<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'colocation_id' => auth()->user()->colocation_id,
            'name' => $request->name,
        ]);

        return back()->with('success', 'Category created!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
