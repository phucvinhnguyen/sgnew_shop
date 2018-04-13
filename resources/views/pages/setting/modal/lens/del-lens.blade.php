<div id="del-refraction-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận</h4>
            </div>
            <div class="modal-body">
                Xóa thông tin?
                <form action="{{ route('page.setting.refractionDel') }}" method="POST" id="delRefractionForm">
                    {{ csrf_field() }}
                    <input type="hidden" class="refraction-id" name="refraction-id" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="delRefractionForm">Xóa</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>