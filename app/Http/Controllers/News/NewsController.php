<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function all(){
        $news = DB::table('news')->get();
        return view('news.all')->with('news', $news);
    }

    public function one($slug){
        $news_item = DB::table('news')->where('slug', '=', $slug)->first();
        return view('news.one')->with('item', $news_item);
    }

    public function categories(){
        $items = DB::table('categories')->get();
        return view('news.categories')->with('categories', $items);
    }

    public function category($slug){
        $category = DB::table('categories')->where('slug', '=', $slug)->first();
        $news = DB::table('news')->where('category_id', '=', $category->id)->get();
        return view('news.category_news', [
                'category' => $category,
                'news' => $news
            ]
        );
    }
}
