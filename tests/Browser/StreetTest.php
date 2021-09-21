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
        $this->browse(
            function (Browser $browser) use ($street) {
                $browser
                    ->visitRoute('streets.index')
                    ->assertSee($street->name);
            }
        );
    }

    public function testCreateStreetWithName012()
    {
        $this->browse(
            function (Browser $browser) {
                $browser
                    ->visitRoute('streets.create')
                    ->type('@name', 'Rua 012')
                    ->screenshot('streets_create')
                    ->assertInputValue('name', 'Rua 0');
            }
        );
    }

    public function testCreateAndSeeStreetInIndex()
    {
        $street = Street::factory()->make();
        $this->browse(
            function (Browser $browser) use ($street) {
                $browser
                    ->visitRoute('streets.create')
                    ->type('@name', $street->name)
                    ->type('@number', $street->number)
                    ->press('@submit')
                    ->clickLink('back')
                    ->assertSee($street->name);
            }
        );
    }

    public function testInvalidInputHasClass()
    {
        $this->browse(
            function (Browser $browser) {
                $browser
                    ->visitRoute('streets.create')
                    ->type('@name', '')
                    ->type('@number', 154)
                    ->press('@submit')
                    ->assertAttribute('@name', 'class', ' is-invalid ')
                    ->assertValue('@number', 154)
                    ->assertValue('@name', '');
            }
        );
    }

    public function testPaginationWorks()
    {
        Street::factory()->count(16)->create();
        $this->browse(
            function (Browser $browser) {
                $elements = $browser->visitRoute('streets.index')->elements('@street');
                $this->assertCount(4, $elements);
            }
        );
    }
}
