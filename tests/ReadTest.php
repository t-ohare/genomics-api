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

    /**
     * @testdox Saving a read adds a row to the database
     */
    function testAddingARow()
    {
        $test_read = "CADB";
        $test_search = "CAD"
        $post_body = ["read" => $test_read, "search" => $test_search];
        
        $response = $this -> call('POST', '/user', $post_body);
        dd($response);

    }

    private function clearDatabase()
    {
        // Can't use TRUNCATE because I'm currently using SQLite
        app('db') -> statement("DELETE FROM reads");

    }
}