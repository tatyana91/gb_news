<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all(News $news){
        $news = $news->getAll();
        return view('news.all')->with('news', $news);
    }

    public function one(News $news, $slug){
        $news_item = $news->getItemBySlug($slug);
        return view('news.one')->with('item', $news_item);
    }

    public function categories(Categories $categories){
        $items = $categories->getAll();
        return view('news.categories')->with('categories', $items);
    }

    public function category(Categories $categories, News $news, $slug){
        $category = $categories->getItemBySlug($slug);
        $news = $categories->getNews($news, $slug);
        return view('news.category_news', [
                'category' => $category,
                'news' => $news
            ]
        );
    }
}
