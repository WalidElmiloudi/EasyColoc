<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function store(StoreCategoryRequest $request)
    {
        $colocation = auth()->user()->colocation;

        $colocation->categories()->create([
            'name' => $request->name,
        ]);

        return back()->with('success', 'Category created successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }
}
