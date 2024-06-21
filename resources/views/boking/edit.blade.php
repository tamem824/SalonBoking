@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Edit Booking</h1>
        <form action="{{ route('bokings.update', $boking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $boking->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" id="service_id" class="form-control">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $boking->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booked_at">Booked At</label>
                <input type="datetime-local" name="booked_at" id="booked_at" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($boking->booked_at)) }}">
            </div>
            <button type="submit" class="btn btn-success">Update Booking</button>
        </form>
    </div>
@endsection
