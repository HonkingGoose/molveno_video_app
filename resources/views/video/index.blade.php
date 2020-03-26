@extends('layout.app')

@section('content')
<h1 class="titlePage">Molveno Video App</h1>

<div class="d-flex justify-content-center">
    <form class="col-8">
        @csrf
        <div class="form-group ">
            <input class="form-control" placeholder="Search for your favorite video" autofocus tabindex="1"
                type="search" id="search" name="search" value="{{ $search }}">
        </div>
    </form>
</div>

<div class="videoGrid">
    @foreach ($videos as $video)
    <a class="videoItem" data-sequence-number="{{ $loop->iteration }}" tabindex="{{ ++$loop->iteration }}" href="{{ route('watchVideo', ['video' => $video->id]) }}">
        <img src="https://img.youtube.com/vi/{{ $video->youtube_uid }}/0.jpg" alt="Picture of video">
        <p class="videoTitle">{{ $video->title }}</p>
        <p class="videoDescription">{{ $video->description }}</p>
    </a>
    @endforeach
</div>
@endsection

@push('script')
<script src="{{asset('js/thumbnailIndex.js')}}"></script>
@endpush
