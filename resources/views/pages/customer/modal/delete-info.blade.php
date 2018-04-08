<div id="delete-info-customer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận</h4>
            </div>
            <div class="modal-body">
                Xóa thông tin khách hàng ?
                <form action="{{ route('page.customer.deleteInfo') }}" method="POST" id="deleteCustomerInfoForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="phone" value="{{ Request::query('phone') }}">
                    <input type="hidden" id="customerInfoIdVal" value="" name="customer-info-id" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="deleteCustomerInfoForm">Xóa</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>