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
        $response = DB::table('videos')->get();
        $this->assertDatabaseHas('videos', $video->toArray());
    }
}
