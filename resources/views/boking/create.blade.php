@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Create New Booking</h1>
        <form action="{{ route('bokings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" id="service_id" class="form-control">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booked_at">Booked At</label>
                <input type="datetime-local" name="booked_at" id="booked_at" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create Booking</button>
        </form>
    </div>
@endsection
