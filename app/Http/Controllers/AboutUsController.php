<?php

// app/Http/Controllers/AboutUsController.php
namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('aboutus.index', compact('aboutUs'));
    }

    public function edit(AboutUs $aboutUs)
    {
        return view('aboutus.edit', compact('aboutUs'));
    }

    public function update(Request $request, AboutUs $aboutUs)
    {
        $request->validate([
            'title' => 'required',
            'description'=>'required',
            'photo'=>'required'
        ]);

        $aboutUs->update($request->all());
        return redirect()->route('aboutus.index')->with('success', 'About Us updated successfully.');
    }
}

