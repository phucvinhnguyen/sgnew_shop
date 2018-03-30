<div id="checkout-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận thanh toán</h4>
            </div>
            <div class="modal-body">
                @if (!$newCustomer && isset($customer))
                    <span>KHÁCH HÀNG: <h4>{{ $customer->full_name }} ({{ $customer->phone }})</h4> </span> <br/>
                    <form action="{{ route('page.sale.checkout') }}" method="POST" id="checkoutForm">
                        {{ csrf_field() }}
                        <input type="hidden" name="customer_phone" class="form-control" value="{{ $customer->phone }}">
                    </form>
                @else
                    <span>NHẬP THÔNG TIN KHÁCH HÀNG MỚI</span>
                    <form action="{{ route('page.sale.checkout') }}" method="POST" id="checkoutForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên khách hàng</label>
                            <input type="text" name="customer_name" class="form-control" placeholder="Nhập vào tên khách hàng" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="number" name="customer_phone" class="form-control" placeholder="Nhập vào số điện thoại" value="{{ Request::query('phone') }}" required>
                        </div>
                    </form>
                @endif
                <table class="table">
                    <tbody>
                        <tr>
                            <th>TỔNG SỐ TIỀN</th>
                            <td>{{ formatMoney($total) }} đồng</td>
                        </tr>
                        <tr>
                            <th>THANH TOÁN SỐ TIỀN</th>
                            <td><span class="text text-danger">{{ formatMoney($totalReservedPrice) }} đồng</span></td>
                        </tr>
                        <tr>
                            <th>CÒN LẠI</th>
                            <td>{{ formatMoney($total - $totalReservedPrice) }} đồng</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="checkoutForm">Thanh toán</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>