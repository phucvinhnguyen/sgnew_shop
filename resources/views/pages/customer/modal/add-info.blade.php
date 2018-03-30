<div id="add-info-customer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm thông tin</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Loại tật khúc xạ</label>
                    <select name="refraction-error-id" class="form-control m-b">
                        @foreach($refractionError as $rError)
                            <option value="{{ $rError->id }}">{{ $rError->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                        <label>Mắt trái (L)</label>
                        <input type="text" class="form-control" data-required="true" name="left-eye">
                    </div>
                    <div class="col-sm-6">
                        <label>Mắt phải (R)</label>
                        <input type="text" class="form-control" data-required="true" name="right-eye">
                    </div>
                </div>
                <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                        <label>Nhìn xa</label>
                        <input type="text" class="form-control" data-required="true" name="view-far">
                    </div>
                    <div class="col-sm-6">
                        <label>Đọc sách</label>
                        <input type="text" class="form-control" data-required="true" name="read-book">
                    </div>
                </div>
                <div class="form-group">
                    <label>Loại tròng</label>
                    <select name="lens-id" class="form-control m-b">
                        @foreach($allTypeLens as $lens)
                            <option value="{{ $lens->id }}">{{ $lens->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="checkoutForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>