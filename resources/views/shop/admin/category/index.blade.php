@extends('templates.admin.master')
@section('title')
    Category
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
                    <a href="{{route('admin.cat.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                </div>
                <div class="card">
                    <h5 class="card-header">Quản lý danh mục</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng Thái</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                @if(!empty($arIndex))
                                    @php $stt=0 @endphp
                                    @foreach($arIndex as $value)
                                        @php
                                            $stt++;
                                            $nameCat  =  $value->namecat;
                                            $status   =  $value->status;
                                            $urlEdit  = route('admin.cat.edit',$value->id_cat);
                                            $urlDel   = route('admin.cat.del',$value->id_cat);
                                            $urlStatus= route('admin.cat.status',$value->id_cat);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$nameCat}}
                                               
                                            </td>
                                            <td>
                                                @if($status==0)
                                                    <a href="{{$urlStatus}}" class="btn btn-secondary">Ẩn</a>
                                                @else
                                                    <a href="{{$urlStatus}}" class="btn btn-dark">Hiện</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{$urlEdit}}" class="btn btn-primary">Sửa</a>
                                                <a href="{{$urlDel  }}" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arIndex->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection