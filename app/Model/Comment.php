<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    protected $table = "comment";
    protected $primaryKey = "id_comment";
    public $timestamps = false;
    //add
    public function add($add) {
        Comment::insert($add);
    }
    public function getComment($id) {
        return DB::table('comment as cmt')
            ->where('id_product',$id)
            ->orderBy('id_comment','DESC')
            ->join('users as u','cmt.id_user','u.id')
            ->select('cmt.*','u.fullname')
            ->get();
    }
    //get index
    public function getIndex() {
        return DB::table('comment as cmt')
            ->orderBy('id_comment','DESC')
            ->join('users as u','cmt.id_user','u.id')
            ->join('products as pd','pd.id_product','cmt.id_product')
            ->select('cmt.*','u.*','pd.*')
            ->paginate(5);
    }
    public function del($id) {
        $del = Comment::find($id);
        $del->delete();
    }
}
