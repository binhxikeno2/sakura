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
                    <a href="{{route('admin.new.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                </div>
                <div class="card">
                    <h5 class="card-header">Tin tức</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th width="300px">Tên tin</th>
                                    <th width="500px">Mô tả</th>
                                    <th>Hình ảnh</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                @if(!empty($arNew))
                                    @php $stt=0 @endphp
                                    @foreach($arNew as $value)
                                        @php
                                            $stt++;
                                            $id            =  $value->id_news;
                                            $news          =  $value->news;
                                            $preview       =  $value->preview;
                                            $picture_news  = '/storage/app/news/'.$value->picture_news;
                                            $urlDel        =  route('admin.new.del',[$id,$arNew->currentPage()]);
                                            $urlEdit       =  route('admin.new.edit',[$id,$arNew->currentPage()]);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$news}}</td>
                                            <td>{{$preview}}</td>
                                            <td>
                                                @if(!empty($value->picture_news))
                                                    <img src="{{$picture_news}}" style="width: 120px;height: auto" alt="">
                                                @else
                                                    Không có hình
                                                @endif
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
                            {{$arNew->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection