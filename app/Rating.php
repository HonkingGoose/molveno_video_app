<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * @param $videoId
     * @param $userHash
     * @return mixed
     */
    public static function findByVideoIdAndUserHash($videoId, $userHash)
    {
        return Rating::where(
            [
                'video_id' => $videoId,
                "user_hash" => $userHash
            ]
        )->first();
    }
}
