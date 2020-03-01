@extends('templates.admin.master')
@section('title')
    Add User
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Thêm User</h5>
                    <div class="card-body">
                        <form class="needs-validation"  action="{{route('admin.users.postAdd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="username">
                                    <span class="alert-danger">{{$errors->first('username')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="fullname">
                                    <span class="alert-danger">{{$errors->first('fullname')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="email">
                                    <span class="alert-danger">{{$errors->first('email')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Password</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="password">
                                    <span class="alert-danger">{{$errors->first('password')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Address</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="address">
                                    <span class="alert-danger">{{$errors->first('address')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="phone">
                                    <span class="alert-danger">{{$errors->first('phone')}}</span>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="">--Chọn--</option>
                                        @foreach($getLevel as $value)
                                            <option value="{{$value->id_level}}">{{$value->level}}</option>
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