<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Products extends Model
{
    protected $table = "products";
    protected $primaryKey = "id_product";
    public $timestamps = true;
    //get Index
    public function getIndex() {
        return DB::table('products as p')
            ->join('categories as c','c.id_cat','p.id_cat')
            ->orderBy('id_product','DESC')
            ->select('p.*','c.namecat')
            ->paginate(6);
    }
    public function getIndex2($type) {
        return DB::table('products as p')
            ->where('type',$type)
            ->join('categories as c','c.id_cat','p.id_cat')
            ->orderBy('id_product','DESC')
            ->select('p.*','c.namecat')
            ->paginate(6);
    }
    //add product
    public function addProduct($arAdd) {
        Return Products::insert($arAdd);
    }
    //get Id
    public function getId($id) {
        return Products::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        if (!empty($del->picture_descrip)) {
            $arPic = json_decode($del->picture_descrip);
            foreach ($arPic as $key => $value){
                Storage::delete('files/'.$value);
            }
        }
        Storage::delete('files/'.$del->picture);
        $del->delete();
    }
    //edit
    public function edit($id,$arEdit) {
        $edit = $this->getId($id);
        $edit->nameproduct      = $arEdit['nameproduct'];
        $edit->picture          = $arEdit['picture'];
        $edit->picture_descrip  = $arEdit['picture_descrip'];
        $edit->description      = $arEdit['description'];
        $edit->qty              = $arEdit['qty'];
        $edit->price            = $arEdit['price'];
        $edit->sale             = $arEdit['sale'];
        $edit->status           = $arEdit['status'];
        $edit->id_cat           = $arEdit['id_cat'];
        $edit->type             = $arEdit['type'];
        return $edit->update();
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
    //select public
    public function getIndexPublic($type) {
        return DB::table('products as p')
            ->where('type',$type)
            ->where('p.qty','>',0)
            ->join('categories as c','c.id_cat','p.id_cat')
            ->orderBy('id_cat','DESC')
            ->select('p.*','c.namecat')
            ->paginate(8);
    }
    //sale max
    public function max() {
        return DB::table('products')
            ->max('sale');
    }
    //select sale max
    public function saleMax() {
        return DB::table('products')
            ->where('sale',$this->max())
            ->first();
    }
    //get id product
    public function getProduct($id) {
        return DB::table('products as pd')
            ->join('categories as cat','pd.id_cat','cat.id_cat')
            ->where('id_product',$id)
            ->select('pd.*','cat.namecat')
            ->first();
    }
    public function getRelate($id,$type) {
        return DB::table('products as p')
            ->join('categories as c','c.id_cat','p.id_cat')
            ->orderBy('id_product','DESC')
            ->where('id_product','!=',$id)
            ->where('type',$type)
            ->select('p.*','c.namecat')
            ->paginate(4);
    }
    //product id_cat
    public function getDetailCat($id,$type) {
        return DB::table('products as pd')
            ->where('type',$type)
            ->join('categories as cat','pd.id_cat','cat.id_cat')
            ->where('pd.id_cat',$id)
            ->select('pd.*','cat.namecat')
            ->paginate(6);
    }
    //san pham nhieu lượt mua
    public function payProduct() {
        $product = Products::all();
        foreach($product as $value) {
            $count = DB::table('transaction_detail')
                ->where('id_product',$value->id_product)
                ->count();
            $value->pay = $count;
            $value->update();
        }
        return $hotPay = DB::table('products as p')
            ->join('categories as c','c.id_cat','p.id_cat')
            ->where('pay','!=',0)
            ->orderBy('pay','DESC')
            ->select('p.*','c.namecat')
            ->limit(5)
            ->get();
    }
    public function tong($product) {
        $tong = 0;
        foreach ($product as $value) {
            $tong += $value->pay;
        }
        return $tong;
    }
    //hot pay
    public function updateQty($id,$qty) {
        $update = $this->getId($id);
        $update->qty = $update->qty - $qty;
        $update->update();
    }
}
