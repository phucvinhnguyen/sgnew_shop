@extends('layouts.admin')
@section('css-embed')
    <link rel="stylesheet" href="{!! asset('css/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css') !!}" type="text/css" />
@endsection
@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="#"><i class="fa fa-home"></i> Trang chính</a></li>
                <li><a href="#">Khách hàng</a></li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Thống kê khách theo ngày</h3>
            </div>

            <section class="panel panel-default">
                <header class="panel-heading font-bold">Xem báo cáo</header>
                <div class="panel-body">
                    <div class="row text-center">
                        <div class="col-sm-12">
                            <form action="{{ route('page.statistic.customer.searchDate') }}" class="form-inline" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="" class="control-label">Chọn ngày </label>
                                </div>
                                <div class="form-group">
                                    <div class='input-group date' id="fromDate">
                                        <input type='text' class="form-control" name="time_chooseDate" value="{{ Request::query('fromDate') or ''  }}"/>
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
                    </div>
                    <hr/>
                    <div class="row text-center no-gutter">
                        <div class="col-sm-6 b-r b-light">
                            <p class="h4 font-bold m-t">{{ isset($customerReportList) ? formatMoney(sumArrayColumn($customerReportList, 'product_price')) : '0' }}</p>
                            <p class="text-muted">Tổng danh thu</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="h4 font-bold m-t">{{ isset($customerReportList) ? count($customerReportList) : '0' }}</p>
                            <p class="text-muted">Tổng lượt khách</p>
                        </div>
                    </div>
                    <div class="row m">
                        @if (isset($customerReportList) && count($customerReportList) > 0)
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Số điện thoại</th>
                                    <th>Tên khách hàng</th>
                                    <th>Tên hàng</th>
                                    <th>Giá tiền</th>
                                    <th>Đặt trước</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($customerReportList as $key => $reportItem)
                                <tr>
                                    <td><a href="{{ route('page.customer', ['phone' => $reportItem['customer_phone']]) }}">{{ $reportItem['customer_phone'] }}</a></td>
                                    <td><a href="{{ route('page.customer', ['phone' => $reportItem['customer_phone']]) }}">{{ $reportItem['customer_name'] }}</a></td>
                                    <td>{{ $reportItem['product_title'] }}</td>
                                    <td>{{ formatMoney($reportItem['product_price']) }}</td>
                                    <td>{{ formatMoney($reportItem['product_reserved_price']) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
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
                format: "YYYY-MM-DD",
                @if(Request::has('fromDate'))
                date: new Date('{{Request::query('fromDate')}}')
                @endif
            });

            $('#toDate').datetimepicker({
                format: "YYYY-MM-DD",
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