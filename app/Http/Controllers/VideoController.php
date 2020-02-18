<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Datatables;
use Validator;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return view('admin_video.index', ['video' => Video::all()]);

        if($request->ajax())
        {
            $data = Video::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin_video.sample_data');

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
        // $video = new Video();
        // $video->title = $request->input('title');
        // $video->description = $request->input('description');
        // $video->category = $request->input('category');
        // $video->youtube_uid = $request->input('youtube_uid');
        // $video->suitable_for_kids = (bool) $request->input('suitableKids', 0);
        // $video->available_to_watch = (bool) $request->input('available_to_watch', 0);
        // $video->created_by = "flappie het konijn";

        // if ($video->save()) {
        //     return redirect()->route('admin_video.index');
        // } else {
        //     var_dump("Not stored.");
        // }

        //$categories = ['cat1', 'cat2', 'cat3'];

        $rules = array(
            'youtube_uid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' =>  'required',
            'available_to_watch' => 'required',
            'suitable_for_kids' => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'youtube_uid' => $request->youtube_uid,
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'available_to_watch' => $request->available_to_watch,
            'suitable_for_kids' => $request->suitable_for_kids
        );

        Video::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin_video.show', ['video' => $video]);
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
    public function destroy(Video $video)
    {
        if ($video->delete()) {
            return redirect()->route('video.index');
        } else {
            echo "fout bij verwijderen dier";
        }
    }
}
