<?php

namespace App\Http\Controllers\Admin;

use App\Model\Transaction;
use App\Model\Transaction_detail;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function __construct(Transaction $transaction,Transaction_detail $transaction_detail)
    {
        $this->Transaction = $transaction;
        $this->Transaction_detail = $transaction_detail;
    }

    public function index() {
        $arTransaction = $this->Transaction->getIndex();
        return view('shop.admin.transaction.index',compact('arTransaction'));
    }
    //detail
    public function detail($id) {
        $transaction = $this->Transaction->getId($id);
        $arDetail = $this->Transaction_detail->getDetail($id);
        return view('shop.admin.transaction.detail',compact('transaction','arDetail'));
    }
    //export
    public function export($id) {
        $transaction = $this->Transaction->getId($id);
        $arDetail = $this->Transaction_detail->getDetail($id);
        $pdf = PDF::loadView('shop.admin.transaction.printf',compact('transaction','arDetail'));
        return $pdf->download('file.pdf');
    }
    //del
    public function del($id,Request $request) {
        $this->Transaction->del($id);
        $request->session()->flash('msg','Xóa thành công');
        return redirect()->route('admin.transaction.index');
    }
    //status
    public function status($id,Request $request) {
        $result = $this->Transaction->status($id);
        if ($result) {
            $request->session()->flash('msg',$result);
            return redirect()->route('admin.transaction.index');
        }else {
            $request->session()->flash('error','Có lỗi xảy ra');
            return redirect()->route('admin.transaction.index');
        }
    }
}
