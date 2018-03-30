<div id="add-product-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm sản phẩm</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.sale.add') }}" method="POST" id="addProductForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="phone" value="{{ Request::query('phone') }}">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="name-product" placeholder="Nhập vào tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input type="number" class="form-control" name="price-product" placeholder="Nhập giá sản phẩm">
                    </div>
                    <div class="form-group">
                        <label>Đặt trước</label>
                        <span class="text text-danger">NẾU TRẢ HẾT THÌ KHÔNG NHẬP</span>
                        <input type="number" class="form-control" name="reserved-price-product" placeholder="Nhập số tiền đặt trước">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="addProductForm">Thêm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>