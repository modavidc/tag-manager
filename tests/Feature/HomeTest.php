<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Core
use App\Models\Tag;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_empty()
    {
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee('There are no tags.');
    }

    public function test_with_data()
    {
        $tag = Tag::factory()->create();
        
        $this
            ->get('/')
            ->assertStatus(200)
            ->assertSee($tag->name)
            ->assertDontSee('There are no tags.');
    }
}
