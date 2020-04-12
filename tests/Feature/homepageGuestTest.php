<?php

namespace Tests\Feature;

use Tests\TestCase;

class homepageGuestTest extends TestCase
{
    /**
     * GIVEN: I'm a guest.
     * WHEN: I visit the root page `/`.
     * THEN: I should be redirected to the landing page.
     *
     * @return void
     */
    public function testVisitHomePageAsGuestReturnsLandingPage()
    {
        $this->assertGuest();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSessionHasNoErrors();
        $response->assertViewIs('landing_page.guest');
    }
}
