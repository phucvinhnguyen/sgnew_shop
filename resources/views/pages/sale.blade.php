@extends('layouts.admin')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="#">UI kit</a></li>
                <li><a href="#">Table</a></li>
                <li class="active">Static table</li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Bán hàng</h3>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Thông tin sản phẩm</header>
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Nhập giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label>Đưa trước</label>
                                    <input type="text" class="form-control" placeholder="Nhập vào số tiền đặt cọc">
                                </div>
                                <button type="submit" class="btn btn-sm btn-default">Lưu</button>
                            </form>
                        </div>
                    </section>
                </div>
                <div class="col-sm-6">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Horizontal form</header>
                        <div class="panel-body">
                            <form class="bs-example form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="email" class="form-control" placeholder="Email">
                                        <span class="help-block m-b-none">Example block-level help text here.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password</label>
                                    <div class="col-lg-10">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-sm btn-default">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection