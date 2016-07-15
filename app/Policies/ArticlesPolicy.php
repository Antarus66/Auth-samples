<?php

namespace App\Policies;

use App\Article;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlesPolicy
{
    use HandlesAuthorization;

    public function edit(User $user, Article $article)
    {
        return $this->isUsersArticle($user, $article);
    }

    private function isUsersArticle(User $user, Article $article)
    {
        return $article->user_id === $user->id;
    }
}
