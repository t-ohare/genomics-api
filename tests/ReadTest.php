<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ReadTest extends TestCase {
    function setUp()
    {
        parent::setUp();
        $this -> clearDatabase();
    }

    /**
     * @testdox Calling /read returns an array of reads
     */
    function testThereIsAListOfReads()
    {
        $this->get('/read');
        $reads = json_decode($this -> response -> getContent());

        $this -> assertTrue(is_array($reads));

    }

    private function clearDatabase()
    {
        // Can't use TRUNCATE because I'm currently using SQLite
        app('db') -> statement("DELETE FROM reads");

    }
}