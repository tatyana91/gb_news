<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index', [
            'news' => News::query()->paginate(self::COUNT_PER_PAGE)
        ]);
    }

    public function create(News $news) {
        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request) {
        $request->flash();

        $image = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $image = Storage::url($path);
        }

        $slug = Str::slug($request->title);

        $news = new News();
        $news->fill($request->all());
        $news->image = $image;
        $news->slug = $slug;
        $news->save();

        return redirect()->route('news.one', $slug)->with('success', 'Новость добавлена');
    }

    public function edit(News $news) {
        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news) {
        $request->flash();

        $url = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/img', $request->file('image'));
            $url = Storage::url($path);
        }
        $slug = Str::slug($request->title);

        $news->fill($request->all());
        $news->slug = $slug;
        $news->image = $url;
        $news->save();


        return redirect()->route('news.one', $news->slug)->with('success', 'Новость изменена');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }
}
