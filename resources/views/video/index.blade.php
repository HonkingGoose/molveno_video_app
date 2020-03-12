@extends('layout.app')





@section('content')


<h1 class="titlePage">Molveno Video App</h1>

    <div>
        <table>
        @for ($i = 0, $j = 1, $k = 2; $i < sizeOf($video); $i += 3, $j += 3, $k += 3)
            <tr class="videoCollectie">

                @isset($video[$i])
                    <td class="videoItem" tabindex="{{$i}}"><a href="{{ route('watchVideo', ['video' => $video[$i]->id]) }}" >

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
