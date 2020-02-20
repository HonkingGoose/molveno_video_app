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

    public function admin_video_page_returns_a_view()
    {
        $response = $this->get('/admin/video');

        $response->assertStatus(200);
        $response->assertViewIs('admin_video.index');
    }

    /**
     * @test
     */

    public function clicking_admin_video_create_button_opens_a_modal()
    {
        // Click button create
        // Assert modal has proper fields and buttons
        // Click button create in modal.
        // Assert save.
    }

    /**
     * @test
     */

    public function store_with_empty_data_fails()
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

    public function store_succes_saves_to_database_and_redirects()
    {
        $data = factory(Video::class)->make()->toArray();

        // TODO: Figure out how to get ID of just created entry

        $response = $this->post('admin/video/{video}', $data);
        $this->assertDatabaseHas('videos', $data);

        $response->assertRedirect('admin_video.index');
    }

}
