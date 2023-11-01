<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise06Test extends TestCase
{
    use RefreshDatabase;

    public function test_delete_api_should_delete_article_without_stock(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 0]);
                              
        $this->deleteJson(route('api.articles.destroy', $a));

        $a = Article::find($a->id);
        $this->assertNull($a);
    }

    public function test_delete_api_should_return_200_on_success(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 0]);
                              
        $response = $this->deleteJson(route('api.articles.destroy', $a));

        $response->assertStatus(200);
    }

    public function test_delete_api_should_not_delete_article_with_stock(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 100]);
                              
        $this->deleteJson(route('api.articles.destroy', $a));

        $a = Article::find($a->id);
        $this->assertNotNull($a);
    }

    // bonus, return error if deletion fail
    public function test_delete_api_should_return_422_on_failure(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 100]);
                              
        $response = $this->deleteJson(route('api.articles.destroy', $a));

        $response->assertStatus(422)
                 ->assertJsonPath('error', 'Stock must be 0 before deletion');
    }
}
