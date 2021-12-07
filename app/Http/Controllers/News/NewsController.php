<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class NewsController extends Controller
{
    public function all(){
        $news = News::query()
            ->where('is_private', '=', false)
            ->paginate(config('app.count_per_page'));
        return view('news.all')->with('news', $news);
    }

    public function one($slug){
        $news_item = News::query()->where('slug', '=', $slug)->first();
        return view('news.one')->with('item', $news_item);
    }

    public function categories(){
        $items = Category::query()->paginate(config('app.count_per_page'));
        return view('news.categories')->with('categories', $items);
    }

    public function category($slug){
        $category = Category::query()->where('slug', '=', $slug)->first();
        $news = News::query()->where('category_id', '=', $category->id)->paginate(config('app.count_per_page'));
        return view('news.category_news', [
                'category' => $category,
                'news' => $news
            ]
        );
    }
}
