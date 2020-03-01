<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    protected $table = "pay";
    protected $primaryKey = "id_pay";
    public $timestamps = false;
    //get pay
    public function getPay() {
        return Pay::all();
    }
}
