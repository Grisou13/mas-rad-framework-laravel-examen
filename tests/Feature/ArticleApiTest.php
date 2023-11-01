<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class ArticleApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_article_on_missing_article_returns_404(): void
    {
        $response = $this->getJson(route('api.articles.show', ['article' => -1]));

        $response->assertStatus(404);
    }

    public function test_get_article_on_existing_article_returns_200(): void
    {
        $a = Article::create(['reference' => 'Test reference']);

        $response = $this->getJson(route('api.articles.show', ['article' => $a]));

        $response->assertStatus(200);
    }
}
