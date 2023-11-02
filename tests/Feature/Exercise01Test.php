<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\Article;

class Exercise01Test extends TestCase
{
    use RefreshDatabase;

    public function test_create_form_with_nota(): void
    {
        $response = $this->get(route('articles.create'));

        $response->assertSee('name="nota"', false);
    }

    public function test_store_with_nota(): void
    {
        $response = $this->post(route('articles.store', ['reference' => 'test very long',
                                                         'nota' => 'This is a nota']));
        // $response->assertRedirect(route('articles.index'));
        // $this->followRedirects($response);

        // $response->assertRe('This is a nota');
        $this->followRedirects($response)->assertSee('This is a nota');
    }

    public function test_index_show_nota(): void
    {
        $a = Article::create([
            'reference' => 'test reference',
            'nota'      => 'This is a nota'
        ]);

        $response = $this->get(route('articles.index'));

        $response->assertSee('This is a nota');
    }
}
