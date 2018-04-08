<div id="payment-info-customer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.customer.editPayment') }}" method="POST" id="editCustomerPaymentInfo">
                    {{ csrf_field() }}
                    <input type="hidden" name="phone" value="{{ Request::query('phone')}}" />
                    <input type="hidden" id="payment-id" name="payment-id" value="" />
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" id="payment-name-product" class="form-control" data-required="true" name="name-product" required>
                    </div>

                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label>Giá sản phẩm</label>
                            <input type="number" id="payment-price" class="form-control" name="price" required min="0">
                        </div>
                        <div class="col-sm-6">
                            <label>Đã thanh toán</label>
                            <input type="number" class="form-control" id="payment-reserved" name="reserved-price" required min="0">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="editCustomerPaymentInfo">Sửa</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>