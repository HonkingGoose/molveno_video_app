@extends('layout.app')

@section('content')
<h1 class="titlePage">Molveno Video App</h1>

@if ($currentGuest)
<p class="welcomeMessage">Hello {{ $currentGuest->firstName }}</p>
@endif

<div class="d-flex justify-content-center">
    <form>
        @csrf
        <div class="form-row">
            <input class="form-control" placeholder="Search for your favorite video" autofocus tabindex="1"
                type="search" name="search" value="{{ $search }}">
            <select class="form-control" name="category_id" tabindex="2">
                <option value="">--- Select category ---</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button tabindex="3" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

<div class="videoGrid">
    @foreach ($videos as $video)
    <a class="videoItem" data-sequence-number="{{ $loop->iteration }}" tabindex="{{ $loop->iteration+=3 }}"
        href="{{ route('watchVideo', ['video' => $video->id]) }}">
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
