@extends('templates.admin.master')
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
                </div>
                <div class="card">
                    <h5 class="card-header">Quản lý hóa đơn</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                @csrf
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng Thái</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                @if(!empty($arTransaction))
                                    @php $stt=0 @endphp
                                    @foreach($arTransaction as $value)
                                        @php
                                            $stt++;
                                            $nameUser  =  $value->username;
                                            $amount    =  $value->amount;
                                            $status    =  $value->status;
                                            $pay       =  $value->pay;
                                            $export    = '';
                                            $urlDetail =  route('admin.transaction.detail',$value->id_transaction);
                                            $urlDel    =  route('admin.transaction.del',$value->id_transaction);
                                            $urlStatus =  route('admin.transaction.status',$value->id_transaction);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$nameUser}}</td>
                                            <td>{{number_format($amount)}} đ</td>
                                            <td>
                                                @if($status == 1)
                                                    Đã Xử LÝ
                                                @else
                                                    <a href="{{$urlStatus}}" class="btn btn-info">Xử Lý</a>
                                                @endif
                                            </td>
                                            <td>{{$pay}}</td>
                                            <td>
                                                <a href="{{$urlDetail}}" class="btn btn-primary">Chi Tiết</a>
                                                <a href="{{$urlDel}}" class="btn btn-danger">Xóa</a>
                                                <a href="{{route('admin.transaction.export',$value->id_transaction)}}" class="btn btn-success">Xuất đơn</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arTransaction->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
