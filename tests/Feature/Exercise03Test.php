<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise03Test extends TestCase
{
    use RefreshDatabase;

    public function test_delete_without_stock_should_be_ok(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 0]);

        $this->delete(route('articles.destroy', ['article' => $a]));

        $a = Article::find($a->id);
        $this->assertNull($a);
    }

    public function test_delete_with_stock_should_fail(): void
    {
        $a = Article::create(['reference' => 'test',
                              'quantity'  => 100]);

        $this->delete(route('articles.destroy', ['article' => $a]));

        $a = Article::find($a->id);
        $this->assertNotNull($a);
    }    
}
