<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditCategoryTest extends DuskTestCase
{
    /**
     * Title test
     *
     * @return void
     */
    public function testTitleExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/1/edit')
                ->type('title', '')
                ->press('Изменить')
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
            $browser->visit('/admin/categories/1/edit')
                ->type('title', '1')
                ->press('Изменить')
                ->assertSee('Слишком короткое значение для "Название категории"');
        });
    }
}
