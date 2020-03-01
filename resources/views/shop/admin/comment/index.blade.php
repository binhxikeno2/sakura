@extends('templates.admin.master')
@section('title')
    Comment
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
                </div>
                <div class="card">
                    <h5 class="card-header">Quản lý bình luận</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if(!empty($arComment))
                            <table class="table table-striped table-bordered first">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên khách hàng</th>
                                    <th>Email</th>
                                    <th>Nội dung</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                                    @php $stt=0 @endphp
                                    @foreach($arComment as $value)
                                        @php
                                            $stt++;
                                            $nameUser  =  $value->fullname;
                                            $email    =  $value->email;
                                            $content    =  $value->content;
                                            $urlDel    =  route('admin.comment.del',$value->id_comment);
                                        @endphp
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$nameUser}}</td>
                                            <td>{{$email}}</td>
                                            <td>{{$content}}</td>
                                            <td>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Chi Tiết</a>
                                                <div class="modal fade" id="myModal" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Thông tin phản hồi</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Khách hàng</strong>: {{$value->fullname}}</p>
                                                                <p><strong>Email</strong>: {{$value->email}}</p>
                                                                <p><strong>Nội dung phản hồi</strong>: </p>
                                                                <p style="padding-left: 20px">{{$value->content}}</p>
                                                                <p><strong>Sản phẩm</strong>: {{$value->nameproduct}}</p>
                                                                <img src="/storage/app/files/{{$value->picture}}" style="width: 150px;height: auto;" alt="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <a href="{{$urlDel}}" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                                @else
                                Không có bình luaạn
                            @endif
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arComment->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection