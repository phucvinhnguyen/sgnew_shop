<div id="edit-refraction-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chỉnh sửa tật khúc xạ</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.setting.refractionEdit') }}" method="POST" id="editRefractionForm">
                    {{ csrf_field() }}
                    <input type="hidden" class="refraction-id" name="refraction-id" value="" />
                    <div class="form-group">
                        <label>Loại tật khúc xạ</label>
                        <input type="text" class="form-control refraction-title" data-required="true" name="refraction-title" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="editRefractionForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>