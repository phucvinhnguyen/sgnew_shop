<div id="edit-lens-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa tròng kính</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.setting.lensEdit') }}" method="POST" id="editLensForm">
                    {{ csrf_field() }}
                    <input type="hidden" class="lens-id" name="lens-id" value="" />
                    <div class="form-group">
                        <label>Loại tròng kính</label>
                        <input type="text" class="form-control lens-title" data-required="true" name="lens-title" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="editLensForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>