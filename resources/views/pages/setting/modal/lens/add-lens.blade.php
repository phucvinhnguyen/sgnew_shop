<div id="add-lens-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm tròng kính</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.setting.lensAdd') }}" method="POST" id="addLensForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Loại tròng kính</label>
                        <input type="text" name="lens-title" class="form-control" data-required="true" placeholder="Nhập vào loại tròng kính"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="addLensForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>