<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;

class ColocationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);
        
        if (auth()->user()->colocations()->exists()) {
            return back()->withErrors('You are already in a colocation.');
        }

        $colocation = Colocation::create([
            'name' => $request->name,
            'owner_id' => auth()->id()
        ]);

        $colocation->users()->attach(auth()->id(), [
            'role' => 'owner'
        ]);

        return redirect()->back();
}
}
