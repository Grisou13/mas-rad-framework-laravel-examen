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

    public function destroy(Article $article)
    {
        if(!$article->canDestroy())
        {
            return response()->json(['error' => 'Stock must be 0 before deletion'], 422);
        }
        $article->delete();
        return  response()->json($article);
    }
}
