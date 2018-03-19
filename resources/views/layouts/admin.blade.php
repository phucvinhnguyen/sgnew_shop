<!DOCTYPE html>
<html lang="en" class="app">
<head>
  <meta charset="utf-8" />
  <title>Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{!! asset('css/bootstrap.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('css/animate.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('css/font.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('css/toastr.min.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('js/datepicker/datepicker.css') !!}" />
  <link rel="stylesheet" href="{!! asset('js/calendar/bootstrap_calendar.css') !!}" type="text/css" />
  <link rel="stylesheet" href="{!! asset('css/app.css') !!}" type="text/css" />

  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body>

<!-- Wrapper-->
<section class="vbox">

    <!-- Page wrapper -->
    @include('partials.header')
    <section>
        <section class="hbox stretch">
        <!-- Navigation -->
        @include('partials.menu')
        <section id="content">
            <!-- Main view  -->
            @yield('content')
        </section>
        <aside class="bg-light lter b-l aside-md hide" id="notes">
          <div class="wrapper">Notification</div>
        </aside>
    </section>
    <!-- End page wrapper-->
   </section>
</section>
<!-- End wrapper-->

<script src="{!! asset('js/jquery.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/app.plugin.js') !!}"></script>
<script src="{!! asset('js/toastr.min.js') !!}"></script>
<script src="{!! asset('js/charts/sparkline/jquery.sparkline.min.js') !!}"></script>
<script src="{!! asset('js/slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('js/datepicker/bootstrap-datepicker.js') !!}"></script>

{!! Toastr::render() !!}
@yield('scripts')

@yield('embed-scripts')
<script type="text/javascript">
  // add notes
  function addMsg($content) {
        var $msg = `<a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm text-center">
                    <i class="fa fa-envelope-o fa-2x text-success"></i>
                  </span>
                  <span class="media-body block m-b-none">` +
                    $content +
                  `</span>
                </a>`;
    var $el = $('.nav-user'), $n = $('.count:first', $el), $v = parseInt($n.text());
    $('.count', $el).fadeOut().fadeIn().text($v+1);
    $($msg).hide().prependTo($el.find('.list-group')).slideDown().css('display','block');
  }

   $(document).ready(function () {
      @if (session()->has('message'))
        addMsg('{!!session()->get("message")!!}')
      @endif
   });
</script>

</body>
</html>
