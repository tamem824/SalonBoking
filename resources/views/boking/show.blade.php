@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Booking Details</h1>
        <div class="card">
            <div class="card-header">
                Booking #{{ $boking->id }}
            </div>
            <div class="card-body">
                <h5 class="card-title">User: {{ $boking->user->name }}</h5>
                <p class="card-text">Service: {{ $boking->service->name }}</p>
                <p class="card-text">Booked At: {{ $boking->booked_at }}</p>
                
                <a href="{{ route('bokings.edit', $boking->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('bokings.destroy', $boking->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
