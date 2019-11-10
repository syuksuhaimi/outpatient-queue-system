<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  @yield('title')

  <!-- Favicons -->
  <link href="../../template/img/favicon.png" rel="icon">
  <link href="../../template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../../template/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../../template/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../../template/css/style.css" rel="stylesheet">
  <link href="../../template/css/style-responsive.css" rel="stylesheet">

</head>

<body>
  <section id="container">
    <!-- TOP BAR CONTENT & NOTIFICATIONS -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>

      <!--logo start-->
      <a class="logo"><b>Klinik Kesihatan Kamunting</b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
         </li>
        </ul>
      </div>
    </header>
    <!--header end-->

    <!-- MAIN SIDEBAR MENU -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <h5 class="centered">Welcome </h5> 
          <h5 class="centered">
                {{ Auth::guard()->user()->staffName }}
          </h5> 
          <li class="mt">
            <a href="{{ route('viewClinicStaff', Auth::guard()->user()->staffId) }}">
              <i class="fa fa-file-text-o"></i>
              <span>View Account</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="{{ route('queue.show') }}">
              <i class="fa fa-sort-numeric-asc"></i>
              <span>View Queue Number</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="{{ route('queue.show') }}">
              <i class="fa fa-sort-numeric-asc"></i>
              <span>Display Queue Number</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- MAIN CONTENT -->
    <!--main content start-->
    <section id="main-content">
    
        @yield('content')
    
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Klinik Kesihatan Kamunting</strong>. All Rights Reserved
        </p>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../../template/lib/jquery/jquery.min.js"></script>
  <script src="../../template/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="../../template/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="../../template/lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="../../template/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../../template/lib/jquery.scrollTo.min.js"></script>
  <script src="../../template/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="../../template/lib/common-scripts.js"></script>
  <!--script for this page-->
      @yield('script')
</body>

</html>