@extends('templates.admin.master')
@section('title')
    Add Category
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Sửa tin tức</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Tiêu đề tin</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="news" value="{{$edit->news}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Mô tả</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="preview" value="{{$edit->preview}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Hình ảnh</label>
                                    <input type="file" class="form-control" id="validationCustom01" name="picture_news">
                                    @if(!empty($edit->picture_news))
                                        <img src="/storage/app/news/{{$edit->picture_news}}" style="width: 150px;padding-top: 20px">
                                    @endif
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "></br>
                                    <label>Chi tiết</label>
                                    <textarea name="detail" class="ckeditor form-control" id="editor2" cols="30" rows="10">{{$edit->detail}}</textarea>
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