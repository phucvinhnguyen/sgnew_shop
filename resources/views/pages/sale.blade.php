@extends('layouts.admin')
@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Trang chính</a></li>
                <li><a href="#">Bán hàng</a></li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Bán hàng</h3>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Thông tin khách hàng</header>
                        <div class="panel-body">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <form action="{{ route('page.sale.searchCustomer') }}" method="POST" id="searchCustomerPhone">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="phone" placeholder="Nhập vào số điện thoại" value="{{ Request::query('phone') }}" required>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="submit">Tìm!</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                                @if (!$newCustomer && isset($customer))
                                    <span>KHÁCH HÀNG: <b>{{ $customer->full_name }}</b></span>
                                @endif

                        </div>
                    </section>
                </div>
                <div class="col-sm-8">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">
                            <div class="row">
                                <div class="col-sm-6">Sản phẩm</div>
                                <div class="col-sm-6"><button class="btn btn-primary  pull-right" data-toggle="modal" data-target="#add-product-modal">Thêm hàng</button></div>
                            </div>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped b-t b-light product-table">
                                <thead>
                                <tr>
                                    <th width="70" data-field="id">Số</th>
                                    <th>Tên Hàng</th>
                                    <th>Thanh toán trước</th>
                                    <th>Giá tiền</th>
                                    <th width="120">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if (isset($cart))
                                    @foreach($cart as $key => $item)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $item['name-product'] }}</td>
                                        <td>{{ formatMoney($item['reserved-price-product']) }}</td>
                                        <td>{{ formatMoney($item['price-product']) }}</td>
                                        <td>
                                            <button class="btn btn-danger delete-product-item" value="{{ $key }}"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <form action="{{ route('page.sale.deleteItem') }}" method="POST" id="deleteItemForm">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="item-id" value="" id="deleteItemIdValue" />
                                        <input type="hidden" name="phone" value="{{ Request::query('phone') }}">
                                    </form>
                                @endif
                                </tbody>
                                <tfooter>
                                <tr>
                                    <td colspan="2">Tổng cộng</td>
                                    <td>{{ isset($totalReservedPrice) ? formatMoney($totalReservedPrice) : 0 }}</td>
                                    <td>{{ isset($total) ? formatMoney($total) : 0 }}</td>
                                    <td></td>
                                </tr>
                                </tfooter>
                            </table>
                        </div>
                        <footer class="panel-footer font-bold">
                            @if (isset($cart) && count($cart) > 0)
                            <button class="btn btn-primary" data-toggle="modal" data-target="#checkout-modal">Thanh toán</button>
                            <button type="submit" class="btn btn-danger" form="deleteAllForm">Hủy bỏ</button>

                            <form action="{{ route('page.sale.deleteAll') }}" method="POST" id="deleteAllForm">
                                {{ csrf_field() }}
                            </form>
                            @endif
                        </footer>
                    </section>
                </div>
            </div>
        </section>
    </section>
    @include('pages.modal.add-product')
    @include('pages.modal.checkout')
@endsection
@section('embed-scripts')
    <script>
        $(document).ready(function () {
            $('.delete-product-item').click(function () {
                $('#deleteItemIdValue').val($(this).val());
                $('#deleteItemForm').submit();
            });
        });
    </script>
@endsection