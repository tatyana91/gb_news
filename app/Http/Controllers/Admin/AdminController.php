<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function create(Request $request, Categories $categories, News $news){
        if ($request->isMethod('post')) {
            $request->flash();

            $image = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $image = Storage::url($path);
            }

            $slug = Str::slug($request->title);

            DB::table('news')->insert([
                'title' => $request->title,
                'text' => $request->text,
                'is_private' => (isset($request->is_private)),
                'slug' => $slug,
                'image' => $image
            ]);

            return redirect()->route('news.one', $slug)->with('success', 'Новость добавлена');
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
