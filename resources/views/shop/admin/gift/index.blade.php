@extends('templates.admin.master')
@section('title')
    Gift-Code
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
                    <a href="{{route('admin.gift.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                </div>
                <div class="card">
                    <h5 class="card-header">Mã quà tặng</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên mã giảm giá</th>
                                    <th>Số lượng</th>
                                    <th>Gía trị</th>
                                    <th>Thời gian </th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                @if(!empty($arGift))
                                    @php $stt=0 @endphp
                                    @foreach($arGift as $value)
                                        @php
                                            $stt++;
                                            $id        =  $value->id_code;
                                            $namegift  =  $value->namegift;
                                            $qty       =  $value->qty;
                                            $giatri     =  $value->value;
                                            $urlDel    =  route('admin.gift.del',[$id,$arGift->currentPage()]);
                                            $urlEdit   =  route('admin.gift.edit',[$id,$arGift->currentPage()]);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$namegift}}</td>
                                            <td>{{$qty}}</td>
                                            <td>{{$giatri}}%</td>
                                            <td>
                                                {{date( "m/d/Y", strtotime($value->date_start))}} đến {{date( "m/d/Y", strtotime($value->deadline))}}
                                            </td>
                                            <td>
                                                <a href="{{$urlEdit}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{$urlDel}}" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arGift->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection