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

<div>
    {{-- TODO: Remove debug loop --}}
    @foreach ($video as $v)
        {{ $v->title }}<br><br>
        {{ $v->description }}<br><br>
    @endforeach

    <table>
        {{-- We offset the first item in the grid because the search bar has tabindex 1. --}}
        {{-- TODO: decide if offset should be in its own variable for clarity.
             TODO: Check if the display logic actually only shows videos which are set to available?
             TODO: remove duplication in the display logic we're using basically the same code 3 time. --}}
        @for ($firstItemInRow = 2, $secondItemInRow = 3, $thirdItemInRow = 4; $firstItemInRow < count($video); $firstItemInRow +=3, $secondItemInRow +=3, $thirdItemInRow +=3) <tr class="videoCollection">

            @isset($video[$firstItemInRow])
            <td class="videoItem" tabindex="{{$firstItemInRow}}"><a href="{{ route('watchVideo', ['video' => $video[$firstItemInRow]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$firstItemInRow]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$firstItemInRow]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$firstItemInRow]->description}}
                    </p>
                </a>
            </td>
            @endisset
            @isset($video[$secondItemInRow])
            <td class="videoItem" tabindex="{{$secondItemInRow}}"><a href="{{ route('watchVideo', ['video' => $video[$secondItemInRow]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$secondItemInRow]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$secondItemInRow]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$secondItemInRow]->description}}
                    </p>
                </a>
            </td>
            @endisset
            @isset($video[$thirdItemInRow])
            <td class="videoItem" tabindex="{{$thirdItemInRow}}">

                <a href="{{ route('watchVideo', ['video' => $video[$thirdItemInRow]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$thirdItemInRow]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$thirdItemInRow]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$thirdItemInRow]->description}}
                    </p>
                </a>

            </td>
            @endisset
            </tr>
            @endfor
    </table>
</div>
@endsection

@push('script')
<script src="{{asset('js/thumbnailIndex.js')}}"></script>
@endpush
