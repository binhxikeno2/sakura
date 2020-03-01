<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Categories extends Model
{

    protected $table = "categories";
    protected $primaryKey = "id_cat";
    public $timestamps = false;

    //admin/category/index
    public function getIndex() {
        return DB::table('categories')
            ->where('id_sub', 0)
            ->paginate(6);
    }
    //menu đa cấp
    public function sub_menu(){
        return $this->hasMany('app\Model\Categories', 'id_sub');
    }
    //select option
    public function arSelect() {
        return DB::table('categories')
            ->where('id_sub', 0)
            ->get();
    }
    //add cat
    public function addCat($arAdd) {
        return Categories::insert($arAdd);
    }
    //get Id
    public function getId($id) {
        return Categories::find($id);
    }
    //get Cat 0
    public function getCat() {
        return DB::table('categories')->where('id_sub',0)->get();
    }
    //edit
    public function edit($id,$arEdit) {
        $objectItem           = $this->getId($id);
        $objectItem->namecat  = $arEdit['namecat'];
        $objectItem->id_sub   = $arEdit['id_sub'];
        return $objectItem->update();
    }
    //del
    public function del($id) {
        $objectItem  = Categories::find($id);
        $objectItem->delete();
    }
    //status
    public function status($id) {
        $status = $this->getId($id);
        if ($status->status==0) {
            $status->status=1;
            $status->update();
        }elseif ($status->status==1){
            $status->status=0;
            $status->update();
        }
    }
    //select all
    public function getAll() {
        return Categories::all();
    }
}
