<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddCategoryTest extends DuskTestCase
{
    /**
     * Title test
     *
     * @return void
     */
    public function testTitleExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', '')
                ->press('Добавить')
                ->assertSee('Ты забыл заполнить "Название категории"');
        });
    }

    /**
     * Title test
     *
     * @return void
     */
    public function testTitleLength()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', '1')
                ->press('Добавить')
                ->assertSee('Слишком короткое значение для "Название категории"');
        });
    }
}
