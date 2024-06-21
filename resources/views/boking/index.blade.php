@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Bookings</h1>
        <a href="{{ route('bokings.create') }}" class="btn btn-primary mb-3">Create New Booking</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Service</th>
                    <th>Booked At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bokings as $boking)
                    <tr>
                        <td>{{ $boking->id }}</td>
                        <td>{{ $boking->user->name }}</td>
                        <td>{{ $boking->service->name }}</td>
                        <td>{{ $boking->booked_at }}</td>
                        <td>{{ $boking->status }}</td>
                        <td>
                            <a href="{{ route('bokings.show', $boking->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('bokings.edit', $boking->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bokings.destroy', $boking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
