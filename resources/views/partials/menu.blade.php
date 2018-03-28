<aside class="bg-light lter aside-md hidden-print" id="nav">
    <section class="vbox">
        <section class="w-f scrollable">
            <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px"
                 data-color="#333333">

                <!-- nav -->
                <nav class="nav-primary hidden-xs">
                    <ul class="nav">
                        <li class="">
                            <a href="index.html" class="active">
                                <i class="fa fa-dashboard icon">
                                    <b class="bg-danger"></b>
                                </i>
                                <span>Thống kê</span>
                            </a>
                        </li>
                        <li class="{{ isActiveRoute('page.sale') }}">
                            <a href="#layout">
                                <i class="fa fa-money icon">
                                    <b class="bg-warning"></b>
                                </i>
                                <span>Bán hàng</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#layout">
                                <i class="fa fa-file icon">
                                    <b class="bg-primary"></b>
                                </i>
                                <span>Khách hàng</span>
                            </a>
                        </li>
                    </ul>
                    </li>
                    </ul>
                </nav>
                <!-- / nav -->
            </div>
        </section>

        <footer class="footer lt hidden-xs b-t b-dark">
            <div id="chat" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light">Active chats</header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No active chats.</p>
                            <p><a href="#" class="btn btn-sm btn-default">Start a chat</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <div id="invite" class="dropup">
                <section class="dropdown-menu on aside-md m-l-n">
                    <section class="panel bg-white">
                        <header class="panel-heading b-b b-light">
                            John <i class="fa fa-circle text-success"></i>
                        </header>
                        <div class="panel-body animated fadeInRight">
                            <p class="text-sm">No contacts in your lists.</p>
                            <p><a href="#" class="btn btn-sm btn-facebook"><i class="fa fa-fw fa-facebook"></i> Invite
                                    from Facebook</a></p>
                        </div>
                    </section>
                </section>
            </div>
            <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon">
                <i class="fa fa-angle-left text"></i>
                <i class="fa fa-angle-right text-active"></i>
            </a>
            <div class="btn-group hidden-nav-xs">
                <button type="button" title="Chats" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown"
                        data-target="#chat"><i class="fa fa-comment-o"></i></button>
                <button type="button" title="Contacts" class="btn btn-icon btn-sm btn-dark" data-toggle="dropdown"
                        data-target="#invite"><i class="fa fa-facebook"></i></button>
            </div>
        </footer>
    </section>
</aside>
<!-- /.aside -->