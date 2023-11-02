<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.form', ['article' => new Article()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $new = Article::create($request->except('_token', '_method'));
        return redirect()->route('articles.index')->with('success', 'Article created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.form', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreArticleRequest $request, Article $article)
    {
        $update = $article->update($request->except('_token', '_method'));
        return redirect()->route('articles.index')->with('success', 'Article Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
}
