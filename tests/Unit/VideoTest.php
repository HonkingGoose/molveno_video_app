<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutEvents;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Video;
use Illuminate\Support\Facades\DB;

class VideoTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */

    public function creatingARecordIsSavedToTheDatabase()
    {
        $video = factory(Video::class)->create();
        print_r($video);

        $response = DB::table('videos')->get();
        print_r($response);

        $this->assertDatabaseHas('videos', $video);

    }
}
