<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'title' => 'Article1',
                'text' => 'Text1',
                'user_id' => '1'
            ],
            [
                'title' => 'Article2',
                'text' => 'Text2',
                'user_id' => '2'
            ],
        ];

        for ($i = 0; $i < count($articles); $i++) {
            Article::create($articles[$i]);
        }
    }
}
