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
                    @php
                        $pic = '/storage/app/files/'.$getProduct->picture;
                    @endphp
                    <div class="card-body">
                        <form class="needs-validation"  action="{{route('admin.product.postEdit',[$getProduct->id_product,$page])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="nameproduct" value="{{$getProduct->nameproduct}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Danh mục</label>
                                    <select name="idcat" class="form-control">
                                        @foreach($select as $value)
                                            @php $active = '' @endphp
                                            @if($getProduct->id_cat==$value->id_cat)
                                                @php $active = 'selected=""' @endphp
                                            @endif
                                            <option {{$active}} value="{{$value->id_cat}}">{{$value->namecat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Loại sản phẩm</label>
                                    <select name="type" class="form-control">
                                        <option value="{{$getProduct->type}}" selected="">--Chọn--</option>
                                        <option value="2">Sản phẩm tặng</option>
                                        <option value="1">Sản phẩm bán</option>
                                    </select>
                                    <span class="alert-danger">{{$errors->first('type')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" id="validationCustom01" name="hinhanh">
                                    <img src="{{$pic}}" style="max-width: 190px;height: 170px;padding-top: 20px">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Hình ảnh mô tả</label>
                                    <input type="file" class="form-control" multiple="multiple" id="validationCustom01" name="hinhanhmota[]">
                                    @if (!empty($getProduct->picture_descrip))
                                        @php $arPic = json_decode($getProduct->picture_descrip) @endphp
                                        @foreach($arPic as $valuepic)
                                            @php
                                                $urlPicDs = '/storage/app/files/'.$valuepic;
                                            @endphp
                                            <img src="{{$urlPicDs}}" style="max-width: 190px;height: 170px;padding-top: 20px">
                                        @endforeach
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Số lương</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="qty" value="{{$getProduct->qty}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Giá</label>
                                    <input type="number" class="form-control" id="validationCustom01" name="price" value="{{$getProduct->price}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Sale</label>
                                    <select name="editsale" class="form-control">
                                            <option value="0">Không Sale</option>
                                            @for($i=5;$i<=40;$i++)
                                                @if($i%5==0)
                                                    @php $active = '' @endphp
                                                    @if($getProduct->sale == $i)
                                                        @php $active = 'selected=""' @endphp
                                                    @endif
                                                <option {{$active}} value="{{$i}}">{{$i}}%</option>
                                                @endif
                                            @endfor
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Mô tả</label>
                                    <textarea name="description" id="editor2" class="form-control" cols="5" rows="5">{{$getProduct->description}}</textarea>
                                    <script type="text/javascript">
                                        CKEDITOR.replace( 'editor2',
                                            {
                                                filebrowserBrowseUrl: '{{$urlAdmin}}/ckfinder/ckfinder.html',
                                                filebrowserImageBrowseUrl: '{{$urlAdmin}}/ckfinder/ckfinder.html?type=Images',
                                                filebrowserUploadUrl: '{{$urlAdmin}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                                filebrowserImageUploadUrl: '{{$urlAdmin}}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
                                            });
                                    </script>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Chi tiết</label>
                                    <textarea name="detail" class="ckeditor form-control"  cols="30" rows="10">{!! $getProduct->detail_text !!}</textarea>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br/>
                                    <input type="submit" class="btn btn-primary " value="Sửa">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection