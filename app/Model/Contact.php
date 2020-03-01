<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = "id_contact";
    public $timestamps = false;
    protected $fillable = ['id_contact','fullname','email','title','content'];
    //select index
    public function getIndex() {
        return DB::table('contact')
            ->orderBy('id_contact','DESC')
            ->paginate(6);
    }
    //get id
    public function getId($id) {
        return Contact::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        $del->delete();
    }
    //add
    public function add($arContact) {
        return Contact::insert($arContact);
    }
}
