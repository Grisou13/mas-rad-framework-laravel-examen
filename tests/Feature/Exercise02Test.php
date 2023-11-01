<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise02Test extends TestCase
{
    use RefreshDatabase;

    public function test_edit_form_exists(): void
    {
        $a = Article::create(['reference' => 'test']);

        $response = $this->get(route('articles.edit', ['article' => $a]));

        $response->assertSee('<form', false);
    }

    public function test_update_with_too_short_reference(): void
    {
        $a = Article::create(['reference' => 'test']);

        $response = $this->put(route('articles.update', ['article' => $a,
                                                         'reference' => 'Test']));

        $response->assertInvalid('reference');
    }

    public function test_update_with_reference(): void
    {
        $a = Article::create(['reference' => 'test']);

        $response = $this->put(route('articles.update', ['article' => $a,
                                                         'reference' => 'Very long reference']));

        $response->assertRedirectContains('Very long reference');
    }
}
