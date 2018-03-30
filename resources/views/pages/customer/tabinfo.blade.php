<section class="panel panel-default">
    <header class="panel-heading text-right bg-light">
        <ul class="nav nav-tabs pull-left">
            <li class="active"><a href="#profile-2" data-toggle="tab"><i class="fa fa-user text-default"></i> Hồ sơ khách hàng</a></li>
            <li class=""><a href="#messages-2" data-toggle="tab"><i class="fa fa- text-default"></i> Thông tin Mua hàng</a></li>
            <li class=""><a href="#setting-2" data-toggle="tab"><i class="fa fa- text-default"></i> Thiết lập</a></li>
        </ul>
        <span class="hidden-sm">Left tab</span>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade active in" id="profile-2">
                <table class="table">
                    <tbody>
                    @if(isset($customer) && !empty($customer))
                    <tr>
                        <th>Tên khách hàng</th>
                        <td>{{ $customer->full_name }}</td>
                        <th>Số điện thoại</th>
                        <td>{{ $customer->phone }}</td>
                    </tr>
                    @endif
                    @if (isset($lastestInfo) && !empty($lastestInfo))
                    <tr>
                        <th>Ngày</th>
                        <td>{{ $lastestInfo->created_at }}</td>
                        <th>Loại tật khúc xạ</th>
                        <td>{{ $lastestInfo['refraction_error'] }}</td>
                    </tr>
                    <tr>
                        <th>Mắt trái (L)</th>
                        <td>{{ $lastestInfo->left_eye }}</td>
                        <th>Mắt phải (R)</th>
                        <td>{{ $lastestInfo->right_eye }}</td>
                    </tr>

                    <tr>
                        <th>Nhìn xa</th>
                        <td>{{ $lastestInfo->view_far }}</td>
                        <th>Đọc sách</th>
                        <td>{{ $lastestInfo->read_book }}</td>
                    </tr>
                    <tr>
                        <th>Loại tròng đề nghị</th>
                        <td>{{ $lastestInfo['lens'] }}</td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="messages-2">

                @if (isset($buyInfoList) && count($buyInfoList) > 0)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Ngày</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Đã thanh toán</th>
                        <th>Còn lại</th>
                        <th width="30"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($buyInfoList as $info)
                        <tr>
                            <td>{{ $info->created_at }}</td>
                            <td>{{ $info->title }}</td>
                            <td>{{ formatMoney($info->price) }}</td>
                            <td>{{ formatMoney($info->reserved_price)}}</td>
                            <td>{{ formatMoney($info->price - $info->reserved_price)}}</td>
                            <td><button class="btn btn-success" value="{{ $info->id }}"><i class="fa fa-edit"></i></button></td>
                        </tr>
                    @endforeach
                    @else
                        Chưa có thông tin.
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="setting-2">
                <div class="form-group pull-in clearfix">
                    <div class="col-sm-6">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" data-required="true" value="{{ isset($customer) ? $customer->full_name : ''}}">
                    </div>
                    <div class="col-sm-6">
                        <label>Số điện thoại</label>
                        <input type="text" class="form-control" data-type="email" data-required="true" value="{{ isset($customer) ? $customer->phone : '' }}">
                    </div>
                </div>
                <button class="btn btn-primary">Lưu</button>
            </div>
        </div>
    </div>
</section>