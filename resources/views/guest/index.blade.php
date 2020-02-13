@extends('layout.app')

@section('title', 'List of guests')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div></div>
@endsection