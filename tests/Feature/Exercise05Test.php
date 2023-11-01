<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise05Test extends TestCase
{
    use RefreshDatabase;

    public function test_call_put_stock_should_increase_stock_by_1(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 0]);
                              
        $response = $this->put(route('articles.stock', $a));

        $a = Article::find($a->id);
        $this->assertEquals($a->quantity, 1);
    }

    // bonus, display a flash message to confirm action to user
    public function test_call_put_stock_should_show_a_user_confirmation(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 0]);
                              
        $response = $this->put(route('articles.stock', $a));

        $response->assertRedirectContains('Stock increased !');
    }
}
