@extends('templates.admin.master')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Thêm sản phẩm</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="{{route('admin.product.postAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="nameproduct">
                                    <span class="alert-danger">{{$errors->first('nameproduct')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Danh mục</label>
                                        <select name="idcat" class="form-control">
                                            <option value="">--Không--</option>
                                            @foreach($select as $value)
                                                <option value="{{$value->id_cat}}">{{$value->namecat}}</option>
                                            @endforeach
                                        </select>
                                        <span class="alert-danger">{{$errors->first('idcat')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Loại sản phẩm</label>
                                    <select name="type" class="form-control">
                                        <option value="" selected="">--Chọn--</option>
                                        <option value="1">Sản phẩm tặng</option>
                                        <option value="2">Sản phẩm bán</option>
                                    </select>
                                    <span class="alert-danger">{{$errors->first('type')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" id="validationCustom01" name="hinhanh">
                                    <span class="alert-danger">{{$errors->first('hinhanh')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Hình ảnh mô tả</label>
                                    <input type="file" class="form-control" multiple="multiple" id="validationCustom01" name="hinhanhmota[]">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Số lương</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="qty">
                                    <span class="alert-danger">{{$errors->first('qty')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Giá</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="price">
                                    <span class="alert-danger">{{$errors->first('price')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Sale</label>
                                    <select name="sale" class="form-control">
                                        <option value="0">Không Sale</option>
                                        @for($i=5;$i<=40;$i++)
                                            @if($i%5==0)
                                                @php $active = '' @endphp
                                                <option {{$active}} value="{{$i}}">{{$i}}%</option>
                                            @endif
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control" cols="4" rows="4"></textarea>
                                    <span class="alert-danger">{{$errors->first('description')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Chi tiết</label>
                                    <textarea name="detail" class="ckeditor form-control" id="editor2" cols="30" rows="10"></textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'editor2',
                                            {
                                                filebrowserBrowseUrl: '{{$urlAdmin}}/ckfinder/ckfinder.html',
                                                filebrowserImageBrowseUrl: '{{$urlAdmin}}/ckfinder/ckfinder.html?type=Images',
                                                filebrowserUploadUrl: '{{$urlAdmin}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserImageUploadUrl: '{{$urlAdmin}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                            });
                                    </script>
                                    <span class="alert-danger">{{$errors->first('detail')}}</span>
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