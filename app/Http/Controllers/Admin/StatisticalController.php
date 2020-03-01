<?php

namespace App\Http\Controllers\Admin;

use App\Model\Products;
use App\Model\Transaction;
use App\Model\Transaction_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticalController extends Controller
{
    public function __construct(Products $products,Transaction_detail $transaction_detail,Transaction $transaction)
    {
        $this->Product = $products;
        $this->Transaction_detail = $transaction_detail;
        $this->Transaction = $transaction;
    }
    //index
    public function index() {
        $product = $this->Product->payProduct();
        $tong = $this->Product->tong($product);
        $arProduct = [];
        foreach ($product as $key => $value) {
            $tiso = $value->pay/$tong*100;
            $arProduct[$key]['name'] = $value->nameproduct;
            $arProduct[$key]['y'] = round($tiso);
        }
        $arProduct = json_encode($arProduct);
        $transaction = $this->Transaction->getTransaction();
        $hightChart = $this->Transaction->charts();
        return view('shop.admin.statistical.index',compact('arProduct','transaction','hightChart'));
    }
}
