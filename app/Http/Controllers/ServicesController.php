<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Services::all();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo'=> 'required',
        ]);

        Services::create($request->all());
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function show(Services $service)
    {
        return view('services.show', compact('service'));
    }

    public function edit(Services $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Services $service)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'photo'=>'required',
        ]);

        $service->update($request->all());
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Services $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
