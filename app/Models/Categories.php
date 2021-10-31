<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    private static $categories = [
        [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politika'
        ],
        [
            'id' => 3,
            'title' => 'Культура',
            'slug' => 'kultura'
        ]
    ];

    public static function getAll() {
        return static::$categories;
    }

    public static function getItemBySlug($slug) {
        foreach (static::getAll() as $cat) {
            if ($cat['slug'] == $slug) {
                return $cat;
            }
        }
        return [];
    }

    public static function getNews($id) {
        return News::getNewsByCategory($id);
    }
}
