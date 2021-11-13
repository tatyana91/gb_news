<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\News;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(Request $request, Categories $categories){
        if ($request->isMethod('post')) {
            $request->flash();

            $news = array();
            if (File::exists(storage_path() . '/news.json')){
                $news = json_decode(File::get(storage_path() . '/news.json'), true);
            }

            $news_id = count($news) + 1;
            $new_news_item = $request->except(['_token']);
            $new_news_item['is_private'] = (isset($new_news_item['is_private'])) ? 1 : 0;
            $new_news_item['id'] = $news_id;
            $new_news_item['slug'] = Str::slug($new_news_item['title']);

            $news[$news_id] = $new_news_item;

            File::put(storage_path() . '/news.json', json_encode($news, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
            return redirect()->route('news.one', $new_news_item['slug']);
        }

        return view('admin.create', [
            'categories' => $categories->getAll()
        ]);
    }

    public function test1(News $news){
        return response()->json($news->getAll())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function test2(){
        return view('admin.test2');
    }
}
