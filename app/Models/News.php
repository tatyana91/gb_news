<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    private static $news = [
        [
            'id' => 1,
            'title' => 'Новость 1 (спорт)',
            'text' => 'Хорошая новость 1',
            'slug' => 'novost1',
            'category_id' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2 (политика)',
            'text' => 'Хорошая новость 2',
            'slug' => 'novost2',
            'category_id' => 2
        ],
        [
            'id' => 3,
            'title' => 'Новость 3 (спорт)',
            'text' => 'Хорошая новость 3',
            'slug' => 'novost3',
            'category_id' => 1
        ],
        [
            'id' => 4,
            'title' => 'Новость 4 (спорт)',
            'text' => 'Хорошая новость 4',
            'slug' => 'novost4',
            'category_id' => 1
        ]
    ];

    public static function getAll() {
        return static::$news;
    }

    public static function getItemBySlug($slug) {
        $news = static::getAll();
        $key = array_search($slug, array_column($news, 'slug'));
        if ($key !== false) return $news[$key];
        return [];
    }

    public static function getNewsByCategory($id) {
        $news = static::getAll();
        $news_keys = array_keys(array_column($news, 'category_id'), $id);
        $category_news = array();
        foreach ($news_keys as $key) {
            $category_news[] = $news[$key];
        }
        return $category_news;
    }
}
