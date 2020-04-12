<?php

namespace Tests\Feature;

use Tests\TestCase;

class homepageAdminTest extends TestCase
{
    /**
     * GIVEN: I'm a guest.
     * WHEN: I visit the root page `/admin`.
     * THEN: I should be redirected to the Admin login page.
     *
     * @return void
     */
    public function testVisitAdminRootAsGuestRedirectsToAdminLogin()
    {
        $this->assertGuest();
        $response = $this->get('/admin');
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/login');
    }
}
