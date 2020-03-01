@extends('templates.admin.master')
@section('title')
    Add Category
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Thêm danh mục</h5>
                <div class="card-body">
                    <form class="needs-validation"  action="{{route('admin.cat.postAdd')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <label>Tên danh mục</label>
                                <input type="text" class="form-control" id="validationCustom01" name="addcat">
                                <span class="alert-danger">{{$errors->first('addcat')}}</span>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                <label>Danh mục cha</label>
                                @if(!empty($arAdd))
                                <select name="idsub" class="form-control">
                                    <option value="0">--Không--</option>
                                    @foreach($arAdd as $value)
                                        <option value="{{$value->id_cat}}">{{$value->namecat}}</option>
                                    @endforeach
                                </select>
                                @endif
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