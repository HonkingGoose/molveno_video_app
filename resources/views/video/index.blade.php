@extends('layout.app')

@section('title', 'List of videos')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div>
        <p>tekst</p>
    </div>
@endsection