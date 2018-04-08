@extends('layouts.admin')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Trang chính</a></li>
                <li><a href="#">Khách hàng</a></li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Thông tin khách hàng</h3>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Tìm khách hàng</header>
                                <div class="panel-body">
                                    <form action="{{ route('page.customer.search') }}" method="POST" id="searchCustomerPhone">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại khách hàng" value="{{ Request::query('phone') }}">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Tìm kiếm!</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">
                                    Thông tin đã lưu
                                    @if (isset($customerInfo))
                                    <ul class="nav nav-pills pull-right">
                                        <li>
                                            <button class="btn btn-primary btn-s-md" data-toggle="modal" data-target="#add-info-customer-modal">Thêm</button>
                                        </li>
                                    </ul>
                                    @endif
                                </header>
                                <div class="panel-body">
                                    <table class="table">
                                        @if (isset($customerInfo) && count($customerInfo) > 0)
                                        <thead>
                                        <tr>
                                            <th>Ngày</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customerInfo as $info)
                                            <tr>
                                                <td><a href="{{ route('page.customer', ['phone' => Request::query('phone'), 'infoId' => $info->id]) }}">{{ $info->created_at }}</a></td>
                                                <td>
                                                    <button class="btn btn-danger btn-delete-customer-info" data-info-id="{{ $info->id }}">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            Chưa có thông tin.
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    @include('pages.customer.tabinfo')
                </div>
            </div>
        </section>
    </section>
    @include('pages.customer.modal.add-info')
    @include('pages.customer.modal.delete-info')
    @include('pages.customer.modal.payment-info')
@endsection

@section('embed-scripts')
    <script>
        $(document).ready(function () {
            $('.btn-delete-customer-info').click(function () {
                var customerInfoId = $(this).data("info-id");
                $('#customerInfoIdVal').val(customerInfoId);
                $('#delete-info-customer-modal').modal('show');
            });

            $('.btn-edit-payment').click(function () {
                var paymentId = $(this).data("payment-info");
                var paymentTitle = $(this).data("payment-title");
                var paymentPrice = $(this).data("payment-price");
                var paymentReserved = $(this).data("payment-reserved");

                $('#payment-id').val(paymentId);
                $('#payment-name-product').val(paymentTitle);
                $('#payment-price').val(paymentPrice);
                $('#payment-reserved').val(paymentReserved);
                $('#payment-info-customer-modal').modal('show');
            })

        });
    </script>
@endsection