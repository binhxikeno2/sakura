<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = "point";
    protected $primaryKey = "id_point";
    public $timestamps = false;
    //get pay
    public function getPoint() {
        return Point::all()->first();
    }
    public function edit($id,$aredit) {
        $edit = Point::find($id);
        $edit->point = $aredit['point'];
        $edit->update();
    }
}
