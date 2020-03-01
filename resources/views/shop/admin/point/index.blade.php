@extends('templates.admin.master')
@section('title')
    Point
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
        @if(!empty($arCustomer))
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="button-header">
                        <a href="{{route('admin.point.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                    </div>
                    <div class="card">
                        <h5 class="card-header">Danh hiệu</h5>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Danh hiệu</th>
                                    <th scope="col">Chỉ tiêu</th>
                                    <th scope="col">Giảm giá</th>
                                    <th scope="col">Chức năng</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $stt=0 @endphp
                                @foreach($arCustomer as $value)
                                        @php
                                            $stt++;
                                            $id = $value->id_customer;
                                            $customer = $value->customer;
                                            $customer_point = $value->customer_point;
                                            $discount    = $value->discount.' %';

                                        @endphp
                                        <tr>
                                            <th scope="row">{{$stt}}</th>
                                            <td>{{$customer}}</td>
                                            <td>>={{$customer_point}} điểm</td>
                                            <td>{{$discount}}</td>
                                            <td>
                                                <a href="{{route('admin.point.edit',$value->id_customer)}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{route('admin.point.del',$value->id_customer)}}" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card" style="margin-top: 70px">
                        <h5 class="card-header">Quy đổi tiền thưởng</h5>
                        <div class="card-body">
                            <tr>
                                <th>1 điểm = </th>
                                <th>{{number_format($point->point)}} VND</th>
                            </tr>
                            <tr>
                                <a style="float: right;" href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Sửa</a>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <form action="{{route('admin.point.editPoint',$point->id_point)}}" method="post">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Điểm thưởng</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" name="point" value="{{$point->point}}">
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit" class="btn btn-success" value="Cập nhập" />
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div style="float:right;">

            </div>
        </div>
    </div>
@endsection