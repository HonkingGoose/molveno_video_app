<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('video.index', ['video' => Video::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ['cat1', 'cat2', 'cat3'];
        // Category::all();
        return view('admin_video.create', ['video' => Video::all(), 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video();
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool) $request->input('suitableKids', 0);
        $video->available_to_watch = (bool) $request->input('available_to_watch', 0);
        $video->created_by = "flappie het konijn";

        if ($video->save()) {
            return redirect()->route('video.index');
        } else {
            var_dump("Not stored.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('video.show', ['video' => Video::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $categories = ['cat1', 'cat2', 'cat3'];
        return view('admin_video.edit', ['video' => $video, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {

        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool) $request->input('suitableKids', 0);
        $video->available_to_watch = (bool) $request->input('available_to_watch', 0);
        $video->created_by = "flappie het konijn";

        if ($video->save()) {
            return redirect()->route('video.index');
        } else {
            var_dump("Not stored.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
