@extends('layout.admin')

@push('styles')
    <link href="{{ asset('css/admin_layout.css') }}" rel="stylesheet">
@endpush

@section('title', 'Guest list')

@section('helloOne')
@section('content')
<h2>Guest list</h2>
<div>
    @foreach ($guest as $guest)
        <p>
            {{ $guest->firstName }}
            {{ $guest->lastName }}
        </p>
    @endforeach
</div>
{{-- <button onclick="window.history.back()">Back to admin</button><br> --}}
<a href="/admin"><button>Back to admin</button></a><br>
@endsection
@show
