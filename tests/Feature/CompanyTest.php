<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_admin_user_can_access_companies_index_page()
    {
        $user = User::factory()->admin()->create();

        $res = $this->actingAs($user)->get(route('companies.index'));

        $res->assertOk();
    }

    public function test_non_admin_user_cannot_access_companies_index_page()
    {
        $user = User::factory()->create();

        $res = $this->actingAs($user)->get(route('companies.index'));

        $res->assertForbidden();
    }
}
