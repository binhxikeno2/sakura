<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "level";
    protected $fillable = [
      'id_level','level'
    ];
    protected $primaryKey = "id_level";
    public $timestamps = false;
    //select all
    public function getAll() {
        return Level::all();
    }
}
