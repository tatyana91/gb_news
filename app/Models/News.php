<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class News extends Model
{
    use HasFactory;

    /*private $news = [
        "1" => [
            'id' => 1,
            'title' => 'Новость 1 (спорт)',
            'text' => 'Хорошая новость 1',
            'slug' => 'novost1',
            'category_id' => 1,
            'is_private' => 1
        ],
        "2" => [
            'id' => 2,
            'title' => 'Новость 2 (политика)',
            'text' => 'Хорошая новость 2',
            'slug' => 'novost2',
            'category_id' => 2,
            'is_private' => 0
        ],
        "3" => [
            'id' => 3,
            'title' => 'Новость 3 (спорт)',
            'text' => 'Хорошая новость 3',
            'slug' => 'novost3',
            'category_id' => 1,
            'is_private' => 0
        ],
        "4" => [
            'id' => 4,
            'title' => 'Новость 4 (спорт)',
            'text' => 'Хорошая новость 4',
            'slug' => 'novost4',
            'category_id' => 1,
            'is_private' => 1
        ]
    ];*/

    public function getAll() {
        return (File::exists(storage_path() . '/news.json'))
            ? json_decode(File::get(storage_path() . '/news.json'), true)
            : [];
    }

    public function getItemBySlug($slug) {
        $news_items = $this->getAll();
        foreach($news_items as $news_item) {
            if ($news_item['slug'] == $slug) {
                return $news_item;
            }
        }
        return [];
    }

    public function getNewsByCategory($id) {
        $news_items = $this->getAll();
        $category_news = array();
        foreach ($news_items as $news_item) {
            if ($news_item['category_id'] == $id) {
                $category_news[] = $news_item;
            }
        }
        return $category_news;
    }
}
