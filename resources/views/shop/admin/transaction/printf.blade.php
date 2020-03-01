<html>
<title>Bill</title>
</html>
<style type="text/css">
    #box{
        width: 600px;
        height: 800px;
        border:1px solid black;
        padding: 10px;
    }
    table{
        border:1px solid black;
    }
    .left{
        float: left;
    }
    .left p{
        margin-top: 0;
        text-align: center;
    }
    .left h2{
        margin-top: 0;
        margin-bottom: 0;
    }
    .right{
        float: right;
        margin-right: 20px;
    }
    .right p{
        margin-top: 0;
        text-align: center;
    }
    .right h2{
        margin-top:0;
        margin-bottom: 0;
    }
    .top{
        text-align: center;
    }
    .address p{
        margin: 0;
    }
    .address{
        margin-bottom: 20px;
    }
    .information{
        margin-bottom: 20px;
    }
    .clr{
        clear: both;
    }
</style>
<body>
<div id="box">
    <div class="top">
        <h1>HOA DON BAN HANG</h1>
    </div>
    <div class="clr"></div>
    <div class="address">
        <p><strong>72 Nguyen Xuan Nhi</strong></p>
        <p><strong>Hotline: 0362411205</strong></p>
    </div>
    <div class="information">
        <strong>Ho Ten Khach Hang: {{$transaction->fullname}}</strong><br>
        <strong>DT: {{$transaction->phone}}</strong><br>
        <strong>Dia Chi: {{$transaction->address}}</strong><br>
    </div>
    <div>
        <table border="1" style="border-collapse: collapse">
            <tr>
                <th>STT</th>
                <th>Ten San Pham</th>
                <th>So Luong</th>
                <th>Thanh Tien</th>
            </tr>
            @if(!empty($arDetail))
                @php $stt=0 @endphp
                @foreach($arDetail as $value)
                    @php
                        $stt++;
                        $nameproduct  =  $value->nameproduct;
                        $qty          =  $value->qty;
                        $total        =  $value->total;
                    @endphp
                <tr>
                    <td>{{$stt}}</td>
                    <td>{{$nameproduct}}</td>
                    <td>{{$qty}}</td>
                    <td>{{number_format($total)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" align="center">Tong Tien</td>
                    <td colspan="2" align="center"><strong>{{number_format($transaction->amount)}}</strong></td>
                </tr>
            @endif
        </table>
    </div>
</div>
</body>