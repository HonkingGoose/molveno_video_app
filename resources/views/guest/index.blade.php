@extends('layout.admin')


@section('title', 'Guest list')

@section('contentTwo')
<br>
<br>
<h2>Guest list</h2>
<div>
    @foreach ($guest as $guest)
        <p>
            {{ $guest->firstName }}
            {{ $guest->lastName }}
        </p>
    @endforeach
</div>
@endsection

