<?php

// app/Http/Controllers/SitingController.php
namespace App\Http\Controllers;

use App\Models\Siting;
use Illuminate\Http\Request;

class SitingController extends Controller
{
    public function index()
    {
        $sitings = Siting::all();
        return view('sitings.index', compact('sitings'));
    }

    public function create()
    {
        return view('sitings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'type' => 'required',
        ]);

        Siting::create($request->all());
        return redirect()->route('sitings.index')->with('success', 'Siting created successfully.');
    }

    public function show(Siting $siting)
    {
        return view('sitings.show', compact('siting'));
    }

    public function edit(Siting $siting)
    {
        return view('sitings.edit', compact('siting'));
    }

    public function update(Request $request, Siting $siting)
    {
        $request->validate([
            'location' => 'required',
            'type' => 'required',
        ]);

        $siting->update($request->all());
        return redirect()->route('sitings.index')->with('success', 'Siting updated successfully.');
    }

    public function destroy(Siting $siting)
    {
        $siting->delete();
        return redirect()->route('sitings.index')->with('success', 'Siting deleted successfully.');
    }
}
