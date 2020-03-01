<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Slide extends Model
{
    protected $table = "slide";
    protected $primaryKey = "id_slide";
    public $timestamps = false;
    //get index
    public function getIndex() {
        return DB::table('slide')
            ->orderBy('id_slide','DESC')
            ->paginate(6);
    }
    //add
    public function add($arSlide) {
        return Slide::insert($arSlide);
    }
    //get id
    public function getId($id) {
        return Slide::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        Storage::delete('slides/'.$del->img);
        $del->delete();
    }
    //edit
    public function edit($id,$arEdit) {
        $edit = $this->getId($id);
        $edit->title= $arEdit['title'];
        $edit->preview      = $arEdit['preview'];
        $edit->img      = $arEdit['img'];
        return $edit->update();
    }
    //all
    public function getAll() {
        return Slide::all();
    }
}
