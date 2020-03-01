@extends('templates.admin.master')
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
@section('title')
    Thống kê
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

                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto" data-product="{{$arProduct}}"></div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Doanh Thu</h5>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Hình thức thanh toán</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $stt1=0;
                                    $total = 0;
                                @endphp
                                @foreach($transaction as $value)
                                    @php
                                        $stt1++;
                                        $total += $value->amount;
                                    @endphp
                                    <tr>
                                        <td>{{$stt1}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{number_format($value->amount)}}</td>
                                        <td>{{$value->pay}}</td>
                                    </tr>
                                @endforeach
                                <td>
                                    <td colspan="2">Tổng tiền</td>
                                    <td>{{number_format($total)}}</td>
                                </td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div style="float:right;">
            </div>
        </div>
        <div id="container" data-order="{{ $hightChart }}"></div>
    </div>
    <script>
        $(document).ready(function(){
            var order = $('#container').data('order');
            var listOfValue = [];
            var listOfYear = [];
            var listOfSum = [];
            order.forEach(function(element){
                listOfYear.push(element.month);
                listOfValue.push(element.qty);
                listOfSum.push(element.sum);
            });
            var chart = Highcharts.chart('container', {

                title: {
                    text: 'Doanh Thu Hàng Tháng'
                },

                subtitle: {
                    text: '2019'
                },

                xAxis: {
                    categories: listOfYear,
                },
                legend: {
                    "layout": "vertikal", "align": "right", "verticalAlign": "middle"
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: listOfSum,
                }]
            });

            $('#plain').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            $('#inverted').click(function () {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });

            $('#polar').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Polar'
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function(){
            var order1 = $('#container2').data('product');
            var char2 = Highcharts.chart('container2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Top 5 sản phẩm bán chạy nhất năm 2019'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Chiếm',
                    colorByPoint: true,
                    data:
                        order1
                }]
            });

            $('#plain').click(function () {
                chart2.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            $('#inverted').click(function () {
                chart2.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });

            $('#polar').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Polar'
                    }
                });
            });
        });
    </script>
@endsection
