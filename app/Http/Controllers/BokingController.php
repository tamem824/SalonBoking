<?php
namespace App\Http\Controllers;

use App\Models\Boking;
use App\Models\User;
use App\Models\Services;
use Illuminate\Http\Request;

class BokingController extends Controller
{
    public function index()
    {
        $bokings = Boking::with('user', 'service')->get();
        return view('bokings.index', compact('bokings'));
    }

    public function create()
    {
        $users = User::all();
        $services = Services::all();
        return view('bokings.create', compact('users', 'services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'booked_at' => 'required|date',
        ]);

        
        $existingBoking = Boking::where('service_id', $request->service_id)
                                ->where('booked_at', $request->booked_at)
                                ->first();

        if ($existingBoking) {
            return redirect()->back()->withErrors(['booked_at' => 'The selected time is already booked.']);
        }

        Boking::create($request->all());
        return redirect()->route('bokings.index')->with('success', 'Boking created successfully.');
    }

    public function show(Boking $boking)
    {
        return view('bokings.show', compact('boking'));
    }

    public function edit(Boking $boking)
    {
        $users = User::all();
        $services = Services::all();
        return view('bokings.edit', compact('boking', 'users', 'services'));
    }

    public function update(Request $request, Boking $boking)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'booked_at' => 'required|date',
        ]);

        
        $existingBoking = Boking::where('service_id', $request->service_id)
                                ->where('booked_at', $request->booked_at)
                                ->where('id', '!=', $boking->id) 
                                ->first();

        if ($existingBoking) {
            return redirect()->back()->withErrors(['booked_at' => 'The selected time is already booked.']);
        }

        $boking->update($request->all());
        return redirect()->route('bokings.index')->with('success', 'Boking updated successfully.');
    }

    public function destroy(Boking $boking)
    {
        $boking->delete();
        return redirect()->route('bokings.index')->with('success', 'Boking deleted successfully.');
    }
}
