<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    // default values
    protected $attributes = [
        'reviews' => 0,
    ];

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    /**
     * Calculate the average rating from the videos in the database.
     * @param  int $id
     * @return float $output
     */

    public function getAverageRating()
    {
        // $result = DB::table('ratings')->select('score')->where('video_id' = 1)->get();
        // return $result;

        $totalScoreSum = 0;
        foreach ($this->ratings() as $rating) {
            $totalScoreSum += $rating;
        }

        $averageRating = round($totalScoreSum / count($this->ratings()), $precision = 1, $mode = PHP_ROUND_HALF_UP);
        return $averageRating;
    }

    /**
     * This is dependent on the answer of the product owner if this function needs to be implemented fully.
     * Update the rating of a video with a new value.
     * @param  int $id of video to update
     * @return
     */

    public function updateRating()
    {
        return "Function not implemented.";
    }
}
