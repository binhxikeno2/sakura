<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiftCode extends Model
{
    protected $table = "giftcode";
    protected $primaryKey = "id_code";
    public $timestamps = false;
    //get index
    public function getIndex() {
        return DB::table('giftcode')
            ->orderBy('id_code','DESC')
            ->paginate(6);
    }
    //add
    public function add($arGift) {
        return GiftCode::insert($arGift);
    }
    //get id
    public function getId($id) {
        return GiftCode::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        $del->delete();
    }
    //edit
    public function edit($id,$arEdit) {
        $edit = $this->getId($id);
        $edit->namegift = $arEdit['namegift'];
        $edit->qty      = $arEdit['qty'];
        $edit->value    = $arEdit['value'];
        return $edit->update();
    }
    //get gift code
    public function getGift($gift) {
        return DB::table('giftcode')
            ->where('namegift',$gift)
            ->first();
    }
    //check gift
    public function checkGift($code) {
        return DB::table('giftcode')
            ->where('namegift',$code)
            ->first();
    }
}
