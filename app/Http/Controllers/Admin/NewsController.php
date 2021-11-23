<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(){
        return view('admin.news.index', [
            'news' => News::query()->paginate(config('app.count_per_page'))
        ]);
    }

    public function create(News $news) {
        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function store(NewsRequest $request, News $news) {
        $request->validated();

        $result = $this->saveNews($request, $news);

        return redirect()->route('news.one', $result['slug'])->with('success', 'Новость добавлена');
    }

    public function edit(News $news) {
        return view('admin.news.create',[
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(NewsRequest $request, News $news) {
        $request->validated();

        $result = $this->saveNews($request, $news);

        return redirect()->route('news.one', $result['slug'])->with('success', 'Новость изменена');
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }

    public function saveNews(NewsRequest $request, News $news){
        $image = null;
        if ($request->file('image')) {
            $path = Storage::putFile('public/images', $request->file('image'));
            $image = Storage::url($path);
        }

        $slug = Str::slug($request->title);

        $news->fill($request->all());
        $news->image = $image;
        $news->slug = $slug;
        $news->save();

        return array('slug' => $slug);
    }
}
