<aside class="bg-light lter aside-md hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px"
                 data-color="#333333">

                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav">
                        <li class="{{ isActiveRoute('page.sale') }}">
                            <a href="{{ route('page.sale') }}">
                                <i class="fa fa-money icon">
                                    <b class="bg-warning"></b>
                                </i>
                                <span>Bán hàng</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('page.customer') }}">
                            <a href="{{ route('page.customer') }}">
                                <i class="fa fa-file icon">
                                    <b class="bg-primary"></b>
                                </i>
                                <span>Khách hàng</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('page.statistic') }}">
                            <a href="{{ route('page.statistic') }}">
                                <i class="fa fa-dashboard icon">
                                    <b class="bg-danger"></b>
                                </i>
                                <span>Doanh thu</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#">
                                <i class="fa fa-cog icon">
                                    <b class="bg-primary"></b>
                                </i>
                                <span>Cài đặt</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- / nav -->
            </div>
        </section>

        <footer class="footer lt hidden-xs b-t b-dark">
            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
            </a>
        </footer>
    </section>
</aside>
<!-- /.aside -->