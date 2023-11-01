<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_with_too_short_reference(): void
    {
        $response = $this->post(route('articles.store', ['reference' => 'test']));

        $response->assertInvalid(['reference']);
    } 

    public function test_store_with_long_reference(): void
    {
        $response = $this->post(route('articles.store', ['reference' => 'test very long']));

        $response->assertValid(['reference']);
    } 
}
