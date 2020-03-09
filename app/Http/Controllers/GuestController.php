<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Guest;
use App\Video;
use App\Rating;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guest.index', ['guest' => Guest::all()]);
    }

    public function indexVideo()
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * POST method to post rating
     *
     * @param int $input
     * return
     */

    public function postRating(Request $request)
    {

        // pak molveno room number uit request
        // zoek huidige klant op bij room number
        // gebruik deze klant voor het plaatsen van rating

        $ratingSucceed = false;
        // var_dump(intval($request->video_id));

        $rating = new Rating;
        $rating->video_id = intval($request->video_id);
        $rating->score = intval($request->score);
        $rating->user_hash = \App\Guest::find(1)->generateUserHash();

        try {
            $ratingSucceed = $rating->save();
        } catch (\Exception $e) {
            // do logging? or ignore? whatever... you decide.
        }

        return response()->json(["succeed" => $ratingSucceed]);
        // if ($ratingSucceed) {
        //     // do whatever you need to do when a rating succeeds
        // } else {
        //     // the alternative.
        // }
    }

    public function tearDown($input)
    {
        $input = $input;
        // get hash
        // TODO: get guest id from input
        $hash = Guest::find(1)->generateUserHash();
        // compare database entries to hash
        $dbHash = DB::table('ratings')->select('id')->where('user_hash', $hash)->get();
        print_r($dbHash);
        // strip hashes from matching entries
        foreach($dbHash as $f){
            $id = $f->id;
            DB::table('ratings')
                ->where('id', $id)
                ->update(['user_hash' => 'removed after checkout']);
        }
        // redirect to success page
        return redirect('guest/checkout/success');
    }
}
