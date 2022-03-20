<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Core
use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index()
    {
        $tag = Tag::factory()->create();
        
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('There are no tags.');
    }

    public function test_store()
    {
        $this
            ->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    public function test_validate()
    {
        $this
            ->post('tags', ['name' => ''])
            ->assertSessionHasErrors('name');
    }

    public function test_edit()
    {
        $tag = Tag::factory()->create();

        $this->assertDatabaseHas('tags', ['name' => $tag->name]);

        $this
            ->get("tags/{$tag->id}")
            ->assertSee($tag->name);
    }

    public function test_update()
    {
        $tag = Tag::factory()->create();

        $this
            ->put("tags/{$tag->id}", ['name' => 'PHP updated'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP updated']);
    }

    public function test_destroy()
    {
        $tag = Tag::factory()->create();

        $this
            ->delete("tags/{$tag->id}")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }
}
