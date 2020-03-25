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
    <table>
        {{-- We offset the first item in the grid because the search bar has tabindex 1. --}}
        {{-- TODO: rename variables to human readable variables.
             TODO: decide if offset should be in its own variable for clarity.--}}
        @for ($i = 2, $j = 3, $k = 4; $i < sizeOf($video); $i +=3, $j +=3, $k +=3) <tr class="videoCollection">

            @isset($video[$i])
            <td class="videoItem" tabindex="{{$i}}"><a href="{{ route('watchVideo', ['video' => $video[$i]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$i]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$i]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$i]->description}}
                    </p>
                </a>
            </td>
            @endisset
            @isset($video[$j])
            <td class="videoItem" tabindex="{{$j}}"><a href="{{ route('watchVideo', ['video' => $video[$j]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$j]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$j]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$j]->description}}
                    </p>
                </a>
            </td>
            @endisset
            @isset($video[$k])
            <td class="videoItem" tabindex="{{$k}}">

                <a href="{{ route('watchVideo', ['video' => $video[$k]->id]) }}">

                    <img src="https://img.youtube.com/vi/{{$video[$k]->youtube_uid}}/0.jpg" alt="">

                    <p class="videoTitle">
                        {{$video[$k]->title}}
                    </p>
                    <p class="videoDescription">
                        {{$video[$k]->description}}
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
