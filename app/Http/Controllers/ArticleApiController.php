<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleApiController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return response()->json($article);
    }
}
