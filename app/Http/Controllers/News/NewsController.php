<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all(){
        $news = News::getAll();
        return view('news.all')->with('news', $news);
    }

    public function one($slug){
        $news_item = News::getItemBySlug($slug);
        return view('news.one')->with('item', $news_item);
    }

    public function categories(){
        $items = Categories::getAll();
        return view('news.categories')->with('categories', $items);
    }

    public function category($slug){
        $category = Categories::getItemBySlug($slug);
        $news = Categories::getNews($category['id']);
        return view('news.category_news', [
                'category' => $category,
                'news' => $news
            ]
        );
    }
}
