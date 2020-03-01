<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer_Type extends Model
{
    protected $table = "customer_type";
    protected $primaryKey = "id_customer";
    public $timestamps = false;

    public function getAll(){
        return DB::table('customer_type')
            ->orderBy('id_customer','DESC')
            ->get();
    }
    public function getId($id) {
        return Customer_Type::find($id);
    }
    public function del($id) {
        $del = $this->getId($id);
        $del->delete();
    }
    public function add($add) {
        return Customer_Type::insert($add);
    }
    public function edit($arEdit,$id) {
        $edit = $this->getId($id);
        $edit->customer = $arEdit['customer'];
        $edit->customer_point = $arEdit['customer_point'];
        $edit->discount = $arEdit['discount'];
        return $edit->update();
    }
}
