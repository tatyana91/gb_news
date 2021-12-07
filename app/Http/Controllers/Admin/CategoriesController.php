<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::query()->paginate(config('app.count_per_page'))
        ]);
    }

    public function create(Category $category) {
        return view('admin.categories.create',[
            'category' => $category
        ]);
    }

    public function store(CategoryRequest $request, Category $category) {
        $request->validated();

        $result = $this->saveCategory($request, $category);

        return redirect()->route('news.category', $result['slug'])->with('success', 'Категория добавлена');
    }

    public function edit(Category $category) {
        return view('admin.categories.create', [
            'category' => $category
        ]);
    }

    public function update(CategoryRequest $request, Category $category) {
        $request->validated();

        $result = $this->saveCategory($request, $category);

        return redirect()->route('news.category', $result['slug'])->with('success', 'Категория изменена');
    }

    public function destroy(Category $category) {
        News::query()->where('category_id', '=', $category->id)->delete();
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена');
    }

    protected function saveCategory(Request $request, Category $category): array
    {
        $slug = Str::slug($request->title);
        $category->fill($request->all());
        $category->slug = $slug;
        $category->save();

        return [
            'slug' => $slug
        ];
    }
}
