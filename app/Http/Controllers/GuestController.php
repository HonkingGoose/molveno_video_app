<?php

namespace App\Http\Controllers;

use App\Guest;
use App\Video;
use App\Rating;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

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

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    // TODO: Use the category supplied from the view to filter the results of the search.
    // TODO: Add DB seed with category: "All"
    // TODO: If/else statement on category: IF category === "All" OR no category THEN search normally, ELSE filter by category chosen.
    public function indexVideo(Request $request)
    {
        $videos = [];
        $currentGuest = $this->getCurrentGuest($request);

        $request->validate(
            [
                'search' => 'alpha'
            ]
        );

        $search = $request->query('search');
        $categoryId = $request->query('category_id');

        $query = DB::table('videos');

        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
            $query->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($categoryId) {
            // @TODO: fix me later
            // $query->where('category.id', '%' . $categoryId . '%');
        }

        $videos = $query->get();

        // @TODO: replace with real Category model
        // $categories = \App\Category::all();
        // optionally add sorting
        $categories = [];
        $category = new \StdClass();
        $category->id = 1;
        $category->name = "Test category";
        $categories[] = $category;
        $category->id = 2;
        $category->name = "Test category 2";
        $categories[] = $category;

        return view(
            'video.index',
            ['videos' => $videos, 'search' => $search, 'categories' => $categories, 'currentGuest' => $currentGuest]
        );
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
     * @param Request $request
     * @return JsonResponse
     */

    public function postRating(Request $request)
    {
        $currentGuest = $this->getCurrentGuest($request);

        if (!$currentGuest) {
            return response()->json(["error" => "ROOM_NUMBER cookie is not set"]);
        }

        $rating = Rating::findByVideoIdAndUserHash(
            $request->video_id,
            $currentGuest->generateUserHash()
        );

        if (!$rating) {
            $rating = new Rating();
        }

        $rating->video_id = intval($request->video_id);
        $rating->score = intval($request->score);
        $rating->user_hash = $currentGuest->generateUserHash();

        try {
            $rating->save();
        } catch (\Exception $e) {
            return response()->json(["error" => "Error when saving rating."]);
        }

        return response()->json(["succeed" => true]);
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

    /**
     * @param Request $request
     * @return |null
     */
    private function getCurrentGuest(Request $request)
    {
        if ($request->hasCookie("ROOM_NUMBER")) {
            $roomNumber = $request->cookie("ROOM_NUMBER");
            return Guest::where('roomNumber', $roomNumber)->first();
        }

        return null;
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
}
