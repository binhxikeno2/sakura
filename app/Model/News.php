<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = "id_news";
    public $timestamps = true;
    //get index
    public function getIndex() {
        return DB::table('news')
            ->orderBy('id_news','DESC')
            ->paginate(6);
    }
    //add
    public function add($arNews) {
        return News::insert($arNews);
    }
    //get id
    public function getId($id) {
        return News::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        Storage::delete('news/'.$del->img);
        $del->delete();
    }
    //edit
    public function edit($id,$arEdit) {
        $edit = $this->getId($id);
        $edit->news= $arEdit['news'];
        $edit->preview      = $arEdit['preview'];
        $edit->detail      = $arEdit['detail'];
        $edit->picture_news      = $arEdit['picture_news'];
        return $edit->update();
    }
    //all
    public function getAll() {
        return news::all();
    }
    //first
    public function first() {
        return DB::table('news')
            ->inRandomOrder()
            ->first();
    }
    public function first2($object) {
        return DB::table('news')
            ->inRandomOrder()
            ->where('id_news','!=',$object->id_news)
            ->first();
    }
}
