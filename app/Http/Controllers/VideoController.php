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
        return view('admin_video.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ['cat1', 'cat2', 'cat3'];

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

        $rules = array(
            'youtube_uid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' =>  'required',

        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }


        $video = new Video();
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool) $request->input('suitable_for_kids', 0);
        $video->available_to_watch = (bool) $request->input('available_to_watch', 0);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('video.show', ['video' => $video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(request()->ajax()) {
            $data = Video::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = array(
            'youtube_uid' => 'required',
            'title' => 'required',
            'description' => 'required',
            'category' =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if ($error->fails()) {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $video = Video::find($request->input('id'));
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->category = $request->input('category');
        $video->youtube_uid = $request->input('youtube_uid');
        $video->suitable_for_kids = (bool) $request->input('suitable_for_kids', 0);
        $video->available_to_watch = (bool) $request->input('available_to_watch', 0);
        $video->created_by = "henk";

        if ($video->save()) {
            return response()->json(['success' => 'Updating video succesful']);
        } else {
            return response()->json(['error' => 'Updating video failed']);
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

        $data = Video::findOrFail($id);
        $data->delete();

    }
}
