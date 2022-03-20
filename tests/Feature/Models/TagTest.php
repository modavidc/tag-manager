<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

// Core
use App\Models\Tag;

class TagTest extends TestCase
{
    public function test_slug()
    {
        $tag = new Tag();
        $tag->name = "Laravel project";

        $this->assertEquals('laravel-project', $tag->slug);
    }
}
