<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    private $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politika'
        ],
        3 => [
            'id' => 3,
            'title' => 'Культура',
            'slug' => 'kultura'
        ]
    ];

    public function getAll() {
        return $this->categories;
    }

    public function getItemBySlug($slug) {
        foreach ($this->getAll() as $cat) {
            if ($cat['slug'] == $slug) {
                return $cat;
            }
        }
        return [];
    }

    public function getNews(News $news, $slug) {
        $category = $this->getItemBySlug($slug);
        return ($category) ? $news->getNewsByCategory($category['id']) : [];
    }
}
