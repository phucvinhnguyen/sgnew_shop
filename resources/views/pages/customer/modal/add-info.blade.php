<div id="add-info-customer-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thêm thông tin</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('page.customer.addInfo') }}" method="POST" id="addCustomerInfoForm">
                    {{ csrf_field() }}
                    <input type="hidden" name="phone" value="{{ Request::query('phone')}}" />

                    <div class="form-group">
                        <label>Loại tật khúc xạ</label>
                        <select name="refraction-error-id" class="form-control m-b" required>
                            @if (isset($refractionError) && count($refractionError) > 0)
                            @foreach($refractionError as $rError)
                                <option value="{{ $rError->id }}">{{ $rError->title }}</option>
                            @endforeach
                                @endif
                        </select>
                    </div>

                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label>Mắt trái (L)</label>
                            <input type="text" class="form-control" name="left-eye" required />
                        </div>
                        <div class="col-sm-6">
                            <label>Mắt phải (R)</label>
                            <input type="text" class="form-control" name="right-eye" required />
                        </div>
                    </div>
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                            <label>Nhìn xa</label>
                            <input type="text" class="form-control" name="view-far" required />
                        </div>
                        <div class="col-sm-6">
                            <label>Đọc sách</label>
                            <input type="text" class="form-control" name="read-book" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Loại tròng</label>
                        <select name="lens-id" class="form-control m-b" required>
                            @if (isset($allTypeLens) && count($allTypeLens) > 0)
                            @foreach($allTypeLens as $lens)
                                <option value="{{ $lens->id }}">{{ $lens->title }}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" form="addCustomerInfoForm">Lưu</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>