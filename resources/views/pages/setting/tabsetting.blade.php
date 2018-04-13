<section class="panel panel-default">
    <header class="panel-heading text-right bg-light">
        <ul class="nav nav-tabs pull-left">
            <li class="active"><a href="#profile-2" data-toggle="tab"><i class="fa fa-cog icon"></i> Thiệt lập</a></li>
        </ul>
        <span class="hidden-sm">Hôm nay: {{ date('d-m-Y') }}</span>
    </header>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade active in" id="profile-2">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                        <div class="col-sm-6"><h4>Loại tật khúc xạ</h4></div>
                        <div class="col-sm-6"><button class="btn btn-primary pull-right" data-toggle="modal" data-target="#add-refraction-modal">Thêm</button></div>
                        <div class="clearfix"></div>
                    </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td width="30" align="center">Số</td>
                                <td>Tật khúc xạ</td>
                                <td width="70" align="center"></td>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($refractionErrors) && count($refractionErrors) > 0)
                            @foreach($refractionErrors as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td align="center">
                                        <a href="#" class="text text-info btn-refraction-edit" data-id="{{ $item->id }}" data-title="{{ $item->title }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="text text-danger btn-refraction-del" data-id="{{ $item->id }}"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6"><h4>Loại tròng kính</h4></div>
                            <div class="col-sm-6"><button class="btn btn-primary pull-right">Thêm</button></div>
                            <div class="clearfix"></div>
                        </div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <td width="30" align="center">Số</td>
                                <td>Loại tròng</td>
                                <td width="70" align="center"></td>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($lens) && count($lens) > 0)
                            @foreach ($lens as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td align="center">
                                        <a href="#" class="text text-info"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="text text-danger"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>