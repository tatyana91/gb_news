<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EditNewsTest extends DuskTestCase
{
    /**
     * Title test
     *
     * @return void
     */
    public function testTitleExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('title', '')
                ->press('Изменить')
                ->assertSee('Ты забыл заполнить "Заголовок новости"');
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
            $browser->visit('/admin/news/1/edit')
                ->type('title', '1')
                ->press('Изменить')
                ->assertSee('Слишком короткое значение для "Заголовок новости"');
        });
    }
}
