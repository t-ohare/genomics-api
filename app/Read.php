<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model {

    protected $fillable = ["read", "search"];

    protected $dates = [];

    public static $rules = [
        "read" => "required",
        "search" => "required",
    ];

    // Relationships

}
