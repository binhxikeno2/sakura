<div class="card">
    <h5 class="card-header">Quản lý sản phẩm</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered first">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Loại sản phẩm</th>
                    <th>Trạng Thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($arIndex))
                    @php $stt =0 @endphp
                    @foreach($arIndex as $value)
                        @php
                            $stt++;
                            $name    = $value->nameproduct;
                            $nameCat = $value->namecat;
                            $picture = '/storage/app/files/'.$value->picture;
                            $urlDel  = route('admin.product.del',[$value->id_product,$arIndex->currentPage()]);
                            $urlEdit = route('admin.product.edit',[$value->id_product,$arIndex->currentPage()]);
                            $status  = $value->status;
                            $qty     = $value->qty;
                            $price   = $value->price;
                            $sale    = $price - $price/100*$value->sale;
                        @endphp
                        <tr>
                            <td>{{$stt}}</td>
                            <td>{{$name}}</td>
                            <td>{{$nameCat}}</td>
                            <td>
                                <div style="margin: 0 auto"><img src="{{$picture}}" alt="" style="max-width: 150px;height: 130px"></div>
                            </td>
                            <td>
                                @if($value->type==1)
                                    Sản phẩm bán
                                @else
                                    Sản phẩm tặng
                                @endif
                            </td>
                            <td>
                                @if($status==0)
                                    <a href="{{route('admin.product.status',$value->id_product)}}" class="btn btn-secondary">Ẩn</a>
                                @else
                                    <a href="{{route('admin.product.status',$value->id_product)}}" class="btn btn-dark">Hiện</a>
                                @endif
                            </td>
                            <td>
                                <a href="javascript:void(0)" class="btn btn-success" data-toggle="modal" data-target="#myModal">Chi tiết</a>
                                {{--chi tiet--}}
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog" style="width: 800px">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Sản phẩm: {{$value->nameproduct}}</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>Danh mục</strong>: {{$value->namecat}}</p>
                                                <p><strong>Số lượng</strong>: {{$value->qty}}</p>
                                                <p><strong>Giá</strong>: {{number_format($value->price)}} VND</p>
                                                <p><strong>Sale</strong>: {{number_format($sale)}} VND</p>
                                                <img src="/storage/app/files/{{$value->picture}}" style="width: 150px;height: auto;" alt="">
                                                <p><strong>Mô tả</strong>:{!! $value->description !!}</p>
                                                <p><strong>Thông tin chi tiết</strong>:{!! $value->detail_text !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
        </div>
        {{--end--}}
        <a href="{{$urlEdit}}" class="btn btn-primary">Sửa</a>
        <a href="{!! $urlDel !!}" class="btn btn-danger">Xóa</a>
        </td>
        </tr>
        @endforeach
        @endif
        </tbody>
        </table>
    </div>
    <div style="float:right;padding-top: 10px">
        {{$arIndex->links()}}
    </div>
</div>