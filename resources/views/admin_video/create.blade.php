@extends('layout.admin')

@section('title', 'Video admin')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
<h2>Add video</h2>
<div>
    @foreach ($name as $name)
    @endforeach
</div>
@endsection
