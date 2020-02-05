<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "videos";

    private $id;
    private $youtube_uid;
    private $title;
    private $description;
    private $category;
    private $reviews;
    private $available_to_watch;
    private $suitable_for_kids;
    private $created_by;    

    public function review_video(){

    };
    
    public function upload_by_employee(){

    };

    public function upload_video_by_guest(){

    };

    public function update_video(){

    };

    public function delete_video(){

    };

    public function getAveragerating(){

    };
};
