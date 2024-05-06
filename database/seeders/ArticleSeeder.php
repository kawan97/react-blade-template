<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 100 article
        for ($i = 0; $i < 100; $i++) {
            Article::create([
                'title' => 'Article ' . $i,
                'slug' => 'article-' . $i,
                'view_count' => rand(1, 1000),
                'content' => 'Content ' . $i,
                'language_id' => rand(1, 3),
            ]);
        }
    }
}
