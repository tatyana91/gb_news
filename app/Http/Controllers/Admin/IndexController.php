<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
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
