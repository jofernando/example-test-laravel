<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\Street;

class StreetTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $street = Street::factory()->create();
        $this->browse(function (Browser $browser) use ($street) {
            $browser
                ->visitRoute('streets.index')
                ->storeSource('streets_index.html')
                ->assertSee($street->name);
        });
    }

    public function testCreateStreet()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visitRoute('streets.create')
                ->type('@name', 'Rua 0')
                ->screenshot('streets_create')
                ->assertInputValue('name', 'Rua 0');
        });
    }

    public function testPage()
    {
        $street = Street::factory()->make();
        $this->browse(function (Browser $browser) use ($street) {
            $browser
                ->visitRoute('streets.create')
                ->type('@name', $street->name)
                ->type('@number', $street->number)
                ->press('@submit')
                ->clickLink('back')
                ->assertSee($street->name);
        });
    }
}
