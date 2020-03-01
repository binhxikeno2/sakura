<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction_detail extends Model
{
    protected $table = "transaction_detail";
    protected $primaryKey = "id_transactiondetail";
    public $timestamps = false;
    //add
    public function add($add){
        return Transaction_detail::insert($add);
    }
    //get id
    public function getDetail($id) {
        return DB::table('transaction_detail as td')
            ->join('products as pd','pd.id_product','td.id_product')
            ->where('id_transaction',$id)
            ->orderBy('id_transactiondetail','DESC')
            ->select('td.*','pd.nameproduct')
            ->paginate(6);
    }
    //thong ke

    /*public function order($range) {
        return DB::table('transaction_detail')
            ->where('created_at','>=',$range)
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get([
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as value')
            ])
            ->toJSON();
    }*/
}
