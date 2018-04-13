<div id="add-refraction-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm tật khúc xạ</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.setting.refractionAdd') }}" method="POST" id="addRefractionForm">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Loại tật khúc xạ</label>
                        <input type="text" name="refraction-title" class="form-control" data-required="true"/>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="addRefractionForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>