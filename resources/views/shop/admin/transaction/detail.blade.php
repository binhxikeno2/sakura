@extends('templates.admin.master')
<html lang="{{ app()->getLocale() }}">
@section('title')
    Transaction
@endsection
@section('content')
    @if(Session::has('msg'))
        <div class="alert alert-primary" role="alert">
            {{Session::get('msg')}}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="button-header">
                    <a href="{{route('admin.transaction.index')}}" class="btn btn-rounded btn-success">Quay lại</a>
                </div>
                <div class="card">
                    <h5 class="card-header">Chi tiết đơn hàng</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th colspan="2">Thông tin khách hàng</th>
                                    </tr>
                                    <tr>
                                        <th>Họ tên</th>
                                        <td>{{$transaction->fullname}}</td>
                                    </tr>
                                    <tr>
                                        <th>Địa chỉ</th>
                                        <td>{{$transaction->address}}</td>
                                    </tr>
                                    <tr>
                                        <th>Số điện thoại</th>
                                        <td>{{$transaction->phone}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ngày đặt</th>
                                        <td>{{date( "d/m/Y", strtotime($transaction->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{$transaction->email}}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div><br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>

                                </tr>
                                </thead>
                                @if(!empty($arDetail))
                                    @php $stt=0 @endphp
                                    @foreach($arDetail as $value)
                                        @php
                                            $stt++;
                                            $nameproduct  =  $value->nameproduct;
                                            $qty          =  $value->qty;
                                            $total        =  $value->total;
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$nameproduct}}</td>
                                            <td>{{$qty}}</td>
                                            <td>{{number_format($total)}}</td>
                                        </tr>
                                    @endforeach
                                @endif
                                <tr>
                                    <td colspan="2" align="center">Tổng tiền</td>
                                    <td colspan="2" align="center"><strong>{{number_format($transaction->amount)}}</strong></td>
                                </tr>
                            </table>
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arDetail->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection