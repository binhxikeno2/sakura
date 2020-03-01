@extends('templates.admin.master')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Thêm mã giảm giá</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="{{route('admin.gift.postAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Tên mã giảm giá</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="addgift">
                                    <span class="alert-danger">{{$errors->first('addgift')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="qtygift">
                                    <span class="alert-danger">{{$errors->first('qtygift')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Giá trị</label>
                                    <input type="number" name="gift" class="form-control" placeholder="...%">
                                    <span class="alert-danger">{{$errors->first('gift')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Ngày bắt đầu</label>
                                    <input type="text" class="form-control" name="datestart" value="{{date( "m/d/Y", strtotime($now))}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Ngày kết thúc</label>
                                    <input type="date" class="form-control" name="deadline" value="">
                                    <span class="alert-danger">{{$errors->first('deadline')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br/>
                                    <input type="submit" class="btn btn-primary " value="Thêm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection