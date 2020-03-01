<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $primaryKey = "id_transaction";
    public $timestamps = false;
    //add
    public function add($add) {
        $transaction = new Transaction();
        $transaction->amount  = $add['amount'];
        $transaction->status  = $add['status'];
        $transaction->id_user = $add['id_user'];
        $transaction->id_pay  = $add['id_pay'];
        $transaction->save();
        return $transaction->id_transaction;
    }
    //select index
    public function getIndex() {
        return DB::table('transaction as t')
            ->join('users as u','u.id','t.id_user')
            ->join('pay as p','p.id_pay','t.id_pay')
            ->orderBy('id_transaction','DESC')
            ->select('t.*','u.username','p.pay')
            ->paginate(6);
    }
    //del
    public function del($id) {
        $delTransactionDt = Transaction_detail::where('id_transaction',$id);
        $delTransactionDt->delete();
        $del = Transaction::find($id);
        $del->delete();
    }
    //status
    public function status($id) {
        $status = Transaction::find($id);
        $status->status = 1;
        $arDetail = DB::table('transaction_detail')->where('id_transaction',$id)->get();
        foreach ($arDetail as $value) {
            $product = Products::find($value->id_product);
            if ($product->qty > $value->qty) {
                $product->qty = $product->qty - $value->qty;
                $product->update();
                $status->update();
                return $a = "Xử lý thành công";
            }else {
                return $a = 'Số lượng sản phẩm không đủ, yêu cầu nhập thêm';
            }
        }
    }
    //don hang dc xu ly
    public function getTransaction() {
        return DB::table('transaction as t')
            ->join('users as u','u.id','t.id_user')
            ->join('pay as p','p.id_pay','t.id_pay')
            ->where('status',1)
            ->select('t.*','u.username','p.pay')
            ->paginate(6);
    }
    public function getId($id) {
        return DB::table('transaction as t')
            ->join('users as u','u.id','t.id_user')
            ->join('pay as p','p.id_pay','t.id_pay')
            ->select('t.*','u.*','p.pay')
            ->where('id_transaction',$id)
            ->first();
    }
    //my order
    public function getMyOrder($id) {
        return DB::table('transaction as t')
            ->join('users as u','u.id','t.id_user')
            ->join('pay as p','p.id_pay','t.id_pay')
            ->where('id_user',$id)
            ->select('t.*','u.*','p.pay')
            ->get();
    }
    //thong ke
    public function charts() {
        return DB::table('transaction')
            ->select(DB::raw('month(created_at) as month'),DB::raw('count(*) as qty'),DB::raw('cast(sum(amount) as int) as sum'))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();
    }
}
