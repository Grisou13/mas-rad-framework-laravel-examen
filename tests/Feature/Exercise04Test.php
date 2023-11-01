<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise04Test extends TestCase
{
    use RefreshDatabase;

    public function test_total_number_of_articles_is_visible(): void
    {
        Article::create(['reference' => 'test',
                         'quantity'  => 0]);
                              
        $response = $this->get(route('articles.index'));

        $response->assertSee('1 article');
    }

    public function test_total_number_of_articles_is_visible_and_pluralized(): void
    {
        for ($i = 0; $i < 4; $i++)
            Article::create(['reference' => 'test',
                            'quantity'  => 0]);
                              
        $response = $this->get(route('articles.index'));

        $response->assertSee('4 articles');
    }

    public function test_total_stock_is_visible(): void
    {
        for ($i = 0; $i < 4; $i++)
            Article::create(['reference' => 'test',
                            'quantity'  => 74]);

        $response = $this->get(route('articles.index'));

        $response->assertSee('296 articles in stock');
    }
}
