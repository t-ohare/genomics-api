<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model {

    protected $fillable = ["read", "search"];

    protected $dates = [];

    public static $rules = [
        "read" => ["required","regex:/^[CAGT]{0,160}$/mi"],
        "search" => ["required", "regex:/^[CAGT]{0,10}$/mi"],
    ];

    // Relationships

}
