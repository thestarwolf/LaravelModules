<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

/**
 * @internal
 * @coversNothing
 */
class ContentPageTest extends DuskTestCase
{
    public function testIndex()
    {
        $admin = App\Models\User\User::find(1);
        $this->browse(function (Browser $browser) use ($admin) {
            $browser->loginAs($admin);
            $browser->visit(route('admin.contentpage.index'));
            $browser->assertRouteIs('admin.contentpage.index');
        });
    }
}
