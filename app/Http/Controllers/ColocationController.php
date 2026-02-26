<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Colocation;
use Illuminate\View\View;

class ColocationController extends Controller
{
    public function show(Colocation $colocation): View
    {
        return view('pages.colocation',compact('colocation'));
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
            'owner_id' => auth()->id()
        ]);

        auth()->user()->update([
            'colocation_id' => $colocation->id,
            'colocation_role' => 'owner',
        ]);
        return redirect()->route('colocations.show',$colocation);
}
}
