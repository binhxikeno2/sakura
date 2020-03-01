@extends('templates.admin.master')
@section('title')
    Users
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
        @if(!empty($arUsers))
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="button-header">
                    <a href="{{route('admin.users.add')}}" class="btn btn-rounded btn-primary">+ Thêm mới</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Quản trị viên</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Cấp độ</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $stt=0 @endphp
                            @foreach($arUsers as $value)
                                @if($value->id_level!=3)
                                    @php
                                        $stt++;
                                        $username = $value->username;
                                        $fullname = $value->fullname;
                                        $level    = $value->level;
                                        $urlDel   = route('admin.users.del',$value->id);
                                        $urlEdit  = route('admin.users.edit',$value->id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$stt}}</th>
                                        <td>{{$username}}</td>
                                        <td>{{$fullname}}</td>
                                        <td>{{$level}}</td>
                                        <td>
                                            <a href="{{$urlEdit}}" class="btn btn-primary">Sửa</a>
                                            <a href="{{$urlDel}}" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Người dùng</h5>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Username</th>
                                <th scope="col">Fullname</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $stt1=0 @endphp
                            @foreach($arUsers as $value)
                                @if($value->id_level==3)
                                    @php
                                        $stt1++;
                                        $username1 = $value->username;
                                        $fullname1 = $value->fullname;
                                        $address   = $value->address;
                                        $urlDel    = route('admin.users.del',$value->id);
                                        $urlEdit  = route('admin.users.edit',$value->id);
                                    @endphp
                                    <tr>
                                        <th scope="row">{{$stt1}}</th>
                                        <td>{{$username1}}</td>
                                        <td>{{$fullname1}}</td>
                                        <td>{{$address}}</td>
                                        <td>
                                            <a href="{{$urlEdit}}" class="btn btn-primary">Sửa</a>
                                            <a href="{{$urlDel}}" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               <div style="float:right;">
                   {{$arUsers->links()}}
               </div>
            </div>
    </div>
@endsection