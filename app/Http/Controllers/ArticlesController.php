<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests;
use Illuminate\Auth\Access\AuthorizationException;

class ArticlesController extends Controller
{
    public function edit($id)
    {
        try {
            $article = Article::find($id);
            $this->authorize('edit', $article); // permission check
        } catch (AuthorizationException $e) {
            // Access denied
            return redirect('/');
        }

        // Access granted
        dd($article);
    }
}
