<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Video;
use App\Guest;
use App\Rating;
use Datatables;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Video::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<button type="button" name="edit" id="' . $data->id . '" class="edit btn btn-primary btn-sm">Edit</button>';
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="' . $data->id . '" class="delete btn btn-danger btn-sm">Delete</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin_video.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = ['cat1', 'cat2', 'cat3'];

        return view('admin_video.create', ['video' => Video::all(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'youtube_uid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',

        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $video = new Video();
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool)$request->input('suitable_for_kids', 0);
        $video->available_to_watch = (bool)$request->input('available_to_watch', 0);
        $video->created_by = "henk";

        if ($video->save()) {
            return response()->json(['success' => 'Data Added successfully.']);
        } else {
            return response()->json(['error' => 'Creating video failed']);
        }
    }

    /**
     * Display the specified resource.
     * 
     * @param Request $request
     * @param Video $video
     * @return Application|Factory|View
     */
    public function show(Request $request, Video $video)
    {
        $roomNumber = $request->cookie('ROOM_NUMBER');
        if(!$roomNumber){
            return view('guest.room.set');
        }
        $guest = Guest::where('roomNumber', $roomNumber)->first();
        $rating = Rating::findByVideoIdAndUserHash(
            $video->id,
            $guest->generateUserHash()
        );
        $score = $rating ? $rating->score : 3;

        return view('video.show', ['video' => $video, 'score' => $score]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        if (request()->ajax()) {
            $data = Video::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Video $video
     * @return JsonResponse
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'youtube_uid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ];

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $video = Video::find($request->input('id'));
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool)$request->input('suitable_for_kids', 0);
        $video->available_to_watch = (bool)$request->input('available_to_watch', 0);
        $video->created_by = "henk";

        if ($video->save()) {
            return response()->json(['success' => 'Updating video successful']);
        } else {
            return response()->json(['error' => 'Updating video failed']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy($id)
    {
        $data = Video::findOrFail($id);
        $data->delete();
    }
}
