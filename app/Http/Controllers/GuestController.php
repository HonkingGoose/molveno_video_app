<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Video;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('guest.index', ['guest' => Guest::all()]);
    }

    public function indexVideo(Request $request)
    {
        $guest = $this->getCurrentGuest($request);
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
        $currentGuest = $this->getCurrentGuest($request);

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
    public function showCheckout(Request $request)
    {
        return view('guest.checkout');
    }

    public function showCheckoutSuccess(Request $request)
    {
        return view('guest.checkoutSuccess');
    }

    public function tearDown(Request $request)
    {
        // get hash
        // TODO: get guest id from cookie
        $roomNumber = $request->input('roomNumber');
        $hash = Guest::where('roomNumber', $roomNumber)->first()->generateUserHash();
        // compare database entries to hash
        $dbHash = DB::table('ratings')
                    ->select('id')
                    ->where('user_hash', $hash)
                    ->get();
        //print_r($dbHash);
        // strip hashes from matching entries
        foreach ($dbHash as $f) {
            $id = $f->id;
            DB::table('ratings')
                ->where('id', $id)
                ->update(['user_hash' => null]);
        }
        // redirect to success page
        return redirect()->route('guest.checkout.success');
    }

    private function getCurrentGuest(Request $request)
    {
        if ($request->hasCookie("ROOM_NUMBER")) {
            $roomNumber = $request->cookie("ROOM_NUMBER");
            return Guest::where('roomNumber', $roomNumber)->first();
        } else {
            return redirect()->route('guest.room.set');
        }
    }

    public function setRoomNumberCookie(Request $request)
    {
        $request->validate(
            [
                'roomNumber' => 'required|integer',
            ]
        );

        Cookie::queue('ROOM_NUMBER', $request->input('roomNumber'), 60 * 24 * 365);
        return redirect()->route('guest.room.set');
    }

    public function showRoomView(Request $request)
    {
        $currentRoom = $request->cookie('ROOM_NUMBER');
        $guestForRoom = null;

        if ($currentRoom) {
            $guestForRoom = Guest::where('roomNumber', $currentRoom)->first();
        }

        return view(
            'guest.room',
            [
                'currentRoom' => $currentRoom,
                'guestForRoom' => $guestForRoom
            ]
        );
    }

    public function processSearchForm(Request $request)
    {
        $searchTerm = $request->query('query');
        // Use searchTerm to search for videos with name $searchterm.
        // If no video found: display message: "No video found".
        // For each video found, put in array of found videos.
        // From array, pick videos to show in 3x3 grid.
    }
}
