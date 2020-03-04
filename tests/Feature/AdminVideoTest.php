<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Video;
use Database\Factories\VideoFactory;

class AdminVideoTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function adminVideoPageReturnsAView()
    {
        $response = $this->get('/admin/video');

        $response->assertStatus(200);
        $response->assertViewIs('admin_video.index');
    }

    /**
     * @test
     */

    public function clickingAdminVideoCreateButtonOpensAModal()
    {
        // Click button create
        // Assert modal has proper fields and buttons
        // Click button create in modal.
        // Assert save.
    }

    /**
     * @test
     */

    public function storeWithEmptyDataFails()
    {
        $response = $this->post(
            'admin/video/1', $data = [

            ]
        );

        $response->assertStatus(500);

    }

    /**
     * @test
     */

    public function storeSuccessSavesToDatabaseAndRedirects()
    {
        $data = factory(Video::class)->make()->toArray();

        // TODO: Figure out how to get ID of just created entry

        $response = $this->post('admin/video/{video}', $data);
        $this->assertDatabaseHas('videos', $data);

        $response->assertRedirect('admin_video.index');
    }

}
