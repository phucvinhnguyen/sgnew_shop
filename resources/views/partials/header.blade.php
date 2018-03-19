
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
      <div class="navbar-header aside-md">
      <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
      <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="/images/logo.png" class="m-r-sm">ADMIN</a>
@if (Auth::check())

      <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user">
          <i class="fa fa-cog"></i>
      </a>
  </div>

<ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user">
<li class="dropdown hidden-xs">
  <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
  <section class="dropdown-menu aside-xl animated fadeInUp">
    <section class="panel bg-white">
      <form role="search">
        <div class="form-group wrapper m-b-none">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
          </span>
      </div>
  </div>
</form>
</section>
</section>
</li>

<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <span class="thumb-sm avatar pull-left">
      <img src="/images/avatar.jpg">
  </span>

  {{ Auth::user()->name}}  <b class="caret"></b>
</a>
<ul class="dropdown-menu animated fadeInRight">
    <span class="arrow top"></span>
    <li>
      <a href="#">Thiết lập</a>
  </li>
<li class="divider"></li>
<li>
  <a href="{{route('logout')}}">Đăng xuất</a>
</li>
</ul>
</li>
</ul>
@endif
</header>