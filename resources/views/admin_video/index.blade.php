@extends('layout.admin')

@section('title', 'Video admin-video index page')

@section('sidebar')
    @parent
    <p>This is appended to the master sidebar.</p>
@endsection



@section('content')
@yield('title')

<div>
    <h2>Video index</h2>
    @foreach ($video as $video)
    <p>

        <a href="{{ route('admin_video.edit', [$video->id]) }}"><i class="fas fa-edit"></i></a>
        <a href="{{ route('admin_video.delete', [$video->id]) }}"><i class="fas fa-trash-alt"></i></a>
    </p>
    @endforeach
    <a href="{{ route('admin_video.create') }}"><button class="btn btn-primary">Create Video</button></a>
</div>
@endsection
