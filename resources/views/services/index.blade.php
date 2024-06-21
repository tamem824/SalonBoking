<!-- resources/views/services/index.blade.php -->

<!-- resources/views/services/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Services Page</h1>

        @if ($services->isEmpty())
            <p>No services found.</p>
        @else
            <ul>
                @foreach ($services as $service)
                    <li>{{ $service->name }} - {{ $service->description }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
