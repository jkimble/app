<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreatePosts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
use App\Models\Posts;

class CreatePostsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreatePosts::class)
            ->assertStatus(200);
    }

    /** @test */
    public function can_create_new_post()
    {
        $post = Posts::whereTitle('Some Title')->first();
        $this->assertNull($post);

        Livewire::test(CreatePosts::class)
            ->set('title', 'Some Title')
            ->set('content', 'Some content')
            ->call('save');

        $post = Posts::whereTitle('Some Title')->first();
        $this->assertNotNull($post);
        $this->assertEquals('Some Title', $post->post_title);
        $this->assertEquals('Some content', $post->post_content);
    }
}
