<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index(){
        return view('admin.categories.index', [
            'categories' => Category::query()->paginate(self::COUNT_PER_PAGE)
        ]);
    }

    public function create(Category $category) {
        return view('admin.categories.create',[
            'category' => $category
        ]);
    }

    public function store(Request $request) {
        $request->flash();

        $slug = Str::slug($request->title);

        $category = new Category();
        $category->fill($request->all());
        $category->slug = $slug;
        $category->save();

        return redirect()->route('news.category', $slug)->with('success', 'Категория добавлена');
    }

    public function edit(Category $category) {
        return view('admin.categories.create', [
            'category' => $category
        ]);
    }

    public function update(Request $request) {
        $request->flash();

        $slug = Str::slug($request->title);

        $category = new Category();
        $category->fill($request->all());
        $category->slug = $slug;
        $category->save();


        return redirect()->route('news.category', $category->slug)->with('success', 'Категория изменена');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена');
    }
}
