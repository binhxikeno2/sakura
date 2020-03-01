@extends('templates.admin.master')
@section('title')
    Add Point
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Thêm mới</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="{{route('admin.point.postAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Danh hiệu</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="danhhieu">
                                    <span class="alert-danger">{{$errors->first('danhhieu')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Điểm kiện</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="dieukien">
                                    <span class="alert-danger">{{$errors->first('dieukien')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Giảm giá</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="giamgia">
                                    <span class="alert-danger">{{$errors->first('giamgia')}}</span>
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