<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reward extends Model
{
    protected $table = "rewards";
    protected $primaryKey = "id_reward";
    public $timestamps = true;
    //
    public function add($add) {
        return Reward::insert($add);
    }
    public function myReward($id) {
        return DB::table('rewards as rw')
            ->where('id_user',$id)
            ->orderBy('id_reward','DESC')
            ->join('users as u','u.id','rw.id_user')
            ->join('products as pd','pd.id_product','rw.id_product')
            ->select('rw.*','pd.nameproduct','u.username')
            ->paginate(5);
    }
}
