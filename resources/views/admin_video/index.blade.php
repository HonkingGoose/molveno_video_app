@extends('layout.admin')


@section('content')
<div>
    <h2>Video index</h2>
    @foreach ($video as $video)
    <p>
        <a href="{{ route('admin_video.show', [$video->id]) }}">title: {{ $video->title }} description: {{ $video->description }}</a>
        <a href="{{ route('admin_video.edit', [$video->id]) }}"><i class="fas fa-edit"></i></a>
        <a href="{{ route('admin_video.delete', [$video->id]) }}"><i class="fas fa-trash-alt"></i></a>
    </p>
    @endforeach
    <a href="{{ route('admin_video.create') }}"><button class="btn btn-primary">Create Video</button></a>
</div>
@endsection
