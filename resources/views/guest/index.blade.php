@extends('layout.app')

@section('title', 'List of guests')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

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
@endsection
