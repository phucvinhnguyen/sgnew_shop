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
                @endif
                <span>TỔNG CỘNG: <h4>{{ formatMoney($total) }} đồng</h4></span>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="addProductForm">Thanh toán</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>

    </div>
</div>