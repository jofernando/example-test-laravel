<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $seed = true;

    protected function assertThatPageStatusIsOk($uri)
    {
        $this->get($uri)->assertOk();
    }
}
