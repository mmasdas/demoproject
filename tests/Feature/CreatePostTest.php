<?php

namespace Tests\Feature;

use App\Livewire\CreatePost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // public function test_example(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    use RefreshDatabase;

    public function tets_post_is_created()
    {
        Livewire::test(CreatePost::class)
            ->set('form.title', 'Secret Title')
            ->set('form.body', 'Secret Body')
            ->call('save')
            ->assertSet('success', true);

        $this->assertDatabaseHas('posts', ['title' => 'Secret Title', 'body' => 'Secret Body']);
    }
}
