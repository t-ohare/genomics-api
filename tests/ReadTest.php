<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ReadTest extends TestCase {
    /**
     * The 'read' interface is being scaffolding so this
     * isn't really TDD'd out but I'd rather have these for later
     */
    function testOneIsOne()
    {
        $this -> assertEquals(1,1);
    }
}