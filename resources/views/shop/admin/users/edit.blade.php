@extends('templates.admin.master')
@section('title')
    Add User
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Sửa User</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="username" value="{{$objectItem->username}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="fullname" value="{{$objectItem->fullname}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="email" value="{{$objectItem->email}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="password">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="address" value="{{$objectItem->address}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="phone" value="{{$objectItem->phone}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        @foreach($getLevel as $value)
                                            @php $active='' @endphp
                                            @if($value->id_level==$objectItem->id_level)
                                                @php $active ='selected=""' @endphp
                                            @endif
                                            <option {{$active}} value="{{$value->id_level}}">{{$value->level}}</option>
                                        @endforeach
                                    </select>
                                    <span class="alert-danger">{{$errors->first('level')}}</span>
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