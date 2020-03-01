<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','password', 'fullname', 'email','address','phone','level_id'
    ];
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //select index
    public function getUsers() {
        return DB::table('users as us')
            ->join('level as lv','lv.id_level','us.id_level')
            ->select('us.*','lv.level')
            ->paginate(getenv('row_count'));
    }
    //add
    public function add($arAdd) {
        return User::insert($arAdd);
    }
    //select id
    public function getId($id) {
        return User::find($id);
    }
    //del
    public function del($id) {
        $del = $this->getId($id);
        $del->delete();
    }
    //edit
    public function edit($id,$arEdit) {
        $edit = $this->getId($id);
        $edit->username = $arEdit['username'];
        $edit->password = $arEdit['password'];
        $edit->fullname = $arEdit['fullname'];
        $edit->email    = $arEdit['email'];
        $edit->address  = $arEdit['address'];
        $edit->phone    = $arEdit['phone'];
        $edit->id_level = $arEdit['id_level'];
        return $edit->update();
    }
    //
    public function point($point,$id) {
        $user = $this->getId($id);
        $user->rewardpoint = $user->rewardpoint+$point;
        $user->update();
    }
    public function rewardPoint($id,$point) {
        $user = $this->getId($id);
        $user->rewardpoint = $point;
        $user->update();
    }
    //diem tich luy
    public function accumulated($id,$qty) {
        $user = $this->getId($id);
        $user->accumulated = $user->accumulated+$qty;
        $user->update();
    }
    //loai khach
    public function customer($id,$id_type) {
        $user1 = $this->getId($id);
        $user1->id_customer = $id_type;
        $user1->update();
    }
    //id
    public function getId2($id) {
        return DB::table('users as u')
            ->where('id',$id)
            ->join('customer_type as ct','ct.id_customer','u.id_customer')
            ->select('u.*','ct.*')
            ->first();
    }
    public function updateInfo($id,$update) {
        $object = $this->getId($id);
        $object->fullname = $update['fullname'];
        $object->address = $update['address'];
        $object->email = $update['email'];
        $object->phone = $update['phone'];
        return $object->update();
    }
    public function getTypeUser($id) {
        return DB::table('users as u')
            ->where('id',$id)
            ->join('customer_type as ct','ct.id_customer','u.id_customer')
            ->select('u.*','ct.*')
            ->first();
    }
}
