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
                    <a href="{{route('admin.slide.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                </div>
                <div class="card">
                    <h5 class="card-header">Slide Show</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                @if(!empty($arSlide))
                                    @php $stt=0 @endphp
                                    @foreach($arSlide as $value)
                                        @php
                                            $stt++;
                                            $id        =  $value->id_slide;
                                            $title     =  $value->title;
                                            $preview   =  $value->preview;
                                            $img       =  '/storage/app/slides/'.$value->img;
                                            $urlDel    =  route('admin.slide.del',[$id,$arSlide->currentPage()]);
                                            $urlEdit   =  route('admin.slide.edit',[$id,$arSlide->currentPage()]);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$title}}</td>
                                            <td>{{$preview}}</td>
                                            <td>
                                                <img src="{{$img}}" style="width: 120px;height: auto" alt="">
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
                            {{$arSlide->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection