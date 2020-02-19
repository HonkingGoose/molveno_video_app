@extends('layout.admin')

@push('styles')
    <link href="{{ asset('css/admin_layout.css') }}" rel="stylesheet">
@endpush

@section('title', 'List of guests')

@section('helloOne')
@section('content')
<h2>List of Guests</h2>
<div>
    @foreach ($guest as $guest)
        <p>
            {{ $guest->firstName }}
            {{ $guest->lastName }}
        </p>
    @endforeach
</div>
<button onclick="window.history.back()">Back to central admin home page</button><br>
@endsection
@show
