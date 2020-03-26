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
    {{--
    TODO: Fill the dropdown button with the categories.
    TODO: If no category selected, search all videos.
    TODO: If category selected, only show videos which match both search term and category.
    --}}
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Select a category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <?php
            $categories = App\Video::all()->unique('category');
            $categoriesSorted = $categories->sortBy('category');
            ?>
            @foreach($categoriesSorted as $category)
                <a class="dropdown-item" href="#">"{{ $category->category }}"</a>
            @endforeach
        </div>
    </div>

{{--    Debug stuff below in the for each --}}
    @foreach($categoriesSorted as $category)
        "{{ $category->category }}"
    @endforeach
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
