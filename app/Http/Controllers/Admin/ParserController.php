<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    public function index(){
        $start = microtime(true);

        $rssLinks = [
            'https://lenta.ru/rss/news',
            'https://ria.ru/export/rss2/archive/index.xml'
        ];
        $created_news_count = 0;
        foreach ($rssLinks as $rssLink) {
            $xml = XmlParser::load($rssLink);
            $data = $xml->parse([
                'title' => ['uses' => 'channel.title'],
                'link' => ['uses' => 'channel.link'],
                'description' => ['uses' => 'channel.description'],
                'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
            ]);
            foreach ($data['news'] as $news) {
                if (!$news['category']) {
                    $categoryName = $data['title'];
                } else {
                    $categoryName = $news['category'];
                }
                $category = Category::query()->firstOrCreate([
                    'title' => $categoryName,
                    'slug' => Str::slug($categoryName)
                ]);

                $news_info = News::query()->firstOrCreate([
                    'title' => trim($news['title']),
                    'text' => trim($news['description']),
                    'is_private' => false,
                    'image' => $news['enclosure::url'],
                    'category_id' => $category->id,
                    'slug' => Str::slug($news['title'])
                ]);
                if ($news_info->wasRecentlyCreated) {
                    $created_news_count++;
                }
            }
        }

        $end = microtime(true);

        return view('admin.parser', [
            'news_count' => $created_news_count,
            'exec_time' => round($end - $start, 5)
        ]);
    }
}
