@extends('templates.admin.master')
@section('title')
    Admin
@endsection
@section('content')
    <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Welcome to {{Auth::user()->fullname}} </h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::has('msg'))
            <div class="alert alert-primary" role="alert">
                {{Session::get('msg')}}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif

    </div>
</div>
@endsection