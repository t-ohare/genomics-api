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
        $reads = $this -> getAllReads();

        $this -> assertTrue(is_array($reads));
    }

    /**
     * @testdox Saving a read adds a row to the database
     */
    function testAddingARow()
    {    
        $this -> addReads(1);    

        $number_of_reads = $this -> countAllReads();

        $this -> assertEquals(1, $number_of_reads);
    }

    /**
     * @testdox Saving a read adds a row to the database
     */
    function testAddingMultipleRows()
    {    
        $this -> addReads(3);    

        $number_of_reads = $this -> countAllReads();

        $this -> assertEquals(3, $number_of_reads);
    }

    private function addReads($number)
    {

        for($i = 0; $i < $number; $i++) {
            $reads[] = (new MockRead()) -> toArray();
        }


        $response = $this -> call("POST","read",["reads" => $reads]);
    }

    private function countAllReads()
    {
        return count($this -> getAllReads());
    }

    private function getAllReads()
    {
        $this->get('/read');
        return json_decode($this -> response -> getContent());
    }

    private function clearDatabase()
    {
        // Can't use TRUNCATE because I'm currently using SQLite
        app('db') -> statement("DELETE FROM reads");

    }
}

class MockRead {

    public $read = "TGTCAGATAATAGAAAT";
    public $search = "CA";

    function toArray() {
        return ["read" => $this -> read, "search" => $this -> search];
    }
}