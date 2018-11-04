<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReadsController extends Controller {

    const MODEL = "App\Read";

    use RESTActions;

    /**
     * Because you can post multiple reads at once I've pulled this function out 
     * of the RESTActions trait
     * 
     * @param Request $request Bag of data that the client posted
     */
    public function add(Request $request)
    {
        $m = self::MODEL;

        try {
            $all_reads = collect($request -> input("reads", []));

            $added_rows = $reads -> map(function($read) use ($m) {
                $read_request = new \Illuminate\Http\Request($read);

                $this -> validate($read_request, $m::$rules);

                return $m::create($read);
            });

            return $this->respond(Response::HTTP_CREATED, $added_rows);
        } catch (\Exception $e) {
            return $this->respond(Response::HTTP_BAD_REQUEST, ["exception" => $e -> getMessage()]);
        }

    }
}
