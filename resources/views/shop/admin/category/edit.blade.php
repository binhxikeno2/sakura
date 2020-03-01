@extends('templates.admin.master')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Sửa danh mục</h5>
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="post" action="{{route('admin.cat.postEdit',$objectItem->id_cat)}}">
                            @csrf
                            @if(!empty($objectItem))
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" name="editnamecat" value="{{$objectItem->namecat}}">
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 "><br/>
                                    <label for="validationCustom02">Danh mục cha</label>
                                    <select name="editcat" class="form-control">
                                        <option value="0">Không</option>
                                    @if(!empty($arSelect))
                                        @foreach($arSelect as $value)
                                            @php $active = '' @endphp
                                            @if($value->id_cat==$objectItem->id_sub)
                                                @php
                                                    $active ='selected=""';
                                                @endphp
                                            @endif
                                            <option {{$active}} value="{{$value->id_cat}}">{{$value->namecat}}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"><br/>
                                    <input type="submit" class="btn btn-primary " value="Sửa">
                                </div>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection