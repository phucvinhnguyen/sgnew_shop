@extends('layouts.admin')
@section('css-embed')
    <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') !!}" type="text/css" />
@endsection
@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Trang chính</a></li>
                <li><a href="#">Khách hàng</a></li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Thống kê</h3>
            </div>
            <section class="panel panel-default">
                <header class="panel-heading font-bold">Thống kê hôm nay {{ date('d-m-Y') }}</header>
                <div class="panel-body">
                    <div class="row text-center no-gutter">
                        <div class="col-xs-6 b-r b-light">
                            <p class="h3 font-bold m-t">{{ formatMoney(sumArrayColumn($productMoneyToday->toArray(), 'price')) }}</p>
                            <p class="text-muted">Doanh thu hôm nay</p>
                        </div>
                        <div class="col-xs-6 b-r b-light">
                            <p class="h3 font-bold m-t">{{ count($productMoneyToday) }}</p>
                            <p class="text-muted">Khách hôm nay</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="panel panel-default">
                <header class="panel-heading font-bold">Xem báo cáo</header>
                <div class="panel-body">
                    <div class="row text-center no-gutter">
                        <div class="col-xs-6 b-r b-light">
                        <form action="{{ route('page.statistic.searchDate') }}" class="form-inline" method="POST">
                            <div class="form-group">
                                <label for="" class="control-label">Từ ngày </label>
                            </div>
                            <div class="form-group">
                                <div class='input-group date' id="fromDate">
                                    <input type='text' class="form-control" name="time_FromDate" value="{{ Request::query('fromDate') or ''  }}"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">đến ngày </label>
                            </div>
                            <div class="form-group">
                                <div class='input-group date' id="toDate">
                                    <input type='text' class="form-control" name="time_ToDate"/>
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Xem báo cáo</button>
                            </div>
                        </form>
                        </div>
                        <div class="col-xs-3 b-r b-light">
                            <p class="h4 font-bold m-t">0</p>
                            <p class="text-muted">Tổng danh thu</p>
                        </div>
                        <div class="col-xs-3">
                            <p class="h4 font-bold m-t">{{ count($productMoneyToday) }}</p>
                            <p class="text-muted">Tổng lượt khách</p>
                        </div>
                    </div>
                    <div class="row m">
                        <table class="table table-striped">
                            <tr>
                                <th>Ngày</th>
                                <th>Số lượt khách</th>
                                <th>Doanh thu</th>
                                <th>Còn nợ</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>
@endsection

@section('embed-scripts')
    <script>
        $(document).ready(function () {
            $('#fromDate').datetimepicker({
                format: "DD-MM-YYYY",
                @if(Request::has('fromDate'))
                date: new Date('{{Request::query('fromDate')}}')
                @endif
            });

            $('#toDate').datetimepicker({
                format: "DD-MM-YYYY",
                @if(Request::has('fromDate'))
                date: new Date('{{Request::query('toDate')}}')
                @endif
            });
        });
    </script>

    <!-- Flot -->
    <script src="{{ asset('js/charts/flot/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('js/charts/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('js/charts/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('js/charts/flot/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('js/charts/flot/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('js/charts/flot/jquery.flot.grow.js') }}"></script>
    <script src="{{ asset('js/charts/flot/demo.js') }}"></script>

@endsection