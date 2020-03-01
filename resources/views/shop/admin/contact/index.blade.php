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
                <div class="card">
                    @if(count($arContact)>0)
                    <h5 class="card-header">Quản lý liên hệ</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Fulname</th>
                                        <th>Email</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @php $stt=0 @endphp
                                @foreach($arContact as $value)
                                    @php $stt++ @endphp
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{$value->fullname}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->content}}</td>
                                        <td>
                                            <a href="{{route('admin.contact.del',$value->id_contact)}}" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div style="float:right;padding-top: 10px">
                            {{$arContact->links()}}
                        </div>
                    </div>
                    @else
                        <h5 class="card-header">Không có liên hệ</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection