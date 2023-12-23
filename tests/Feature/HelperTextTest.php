<?php

namespace Tests\Feature;

use App\Livewire\ShowHelp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class HelperTextTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_see_helper_text()
    {
        Livewire::test(ShowHelp::class)
            ->assertDontSee('Lorem Ipsum')
            ->toggle('showHelp')
            ->assertSee('Lorem Ipsum');
    }
}
