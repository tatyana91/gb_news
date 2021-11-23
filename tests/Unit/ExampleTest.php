<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $news = new News();
        $this->assertIsArray($news::all());
    }
}
