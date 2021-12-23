<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>Dashboard</title>

  <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/site.min.css">

  <!-- Plugins -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/flag-icon-css/flag-icon.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/waves/waves.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist/chartist.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/dashboard/v1.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/examples/css/tables/datatable.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/vendor/clockpicker/clockpicker.css">


  <!-- Fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/font-awesome/font-awesome.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/material-design/material-design.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>global/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>global/vendor/html5shiv/html5shiv.min.js"></script>
  <![endif]-->

    <!--[if lt IE 10]>
    <script src="<?php echo base_url(); ?>global/vendor/media-match/media.match.min.js"></script>
    <script src="<?php echo base_url(); ?>global/vendor/respond/respond.min.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo base_url(); ?>global/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
        <!-- <img class="navbar-brand-logo" src="<?php //echo base_url(); ?>assets/images/logo-colored.png" width="36px" height="70px" title="Remark"> -->
        <span class="navbar-brand-text hidden-xs-down"> Admin Dashboard</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
      <span class="sr-only">Toggle Search</span>
      <i class="icon md-search" aria-hidden="true"></i>
    </button>
  </div>

  <div class="navbar-container container-fluid">
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
      <!-- Navbar Toolbar -->
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar">
          <a class="nav-link" data-toggle="menubar" href="#" role="button">
            <i class="icon hamburger hamburger-arrow-left">
              <span class="sr-only">Toggle menubar</span>
              <span class="hamburger-bar"></span>
            </i>
          </a>
        </li>

      </ul>
      <!-- End Navbar Toolbar -->

      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="nav-item">
          <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up"
          aria-expanded="false" role="button">
          Hai, <?php echo $this->session->userdata('nama')?>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
        data-animation="scale-up" role="button">
        <span class="avatar avatar-online">
          <img src="<?php echo base_url(); ?>global/portraits/5.jpg" alt="...">
          <i></i>
        </span>
      </a>
      <div class="dropdown-menu" role="menu">
        <div class="dropdown-divider" role="presentation"></div>
        <a class="dropdown-item" href="<?= base_url('Account/logout')?>" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a>
      </div>
    </li>
  </ul>
  <!-- End Navbar Toolbar Right -->
</div>
<!-- End Navbar Collapse -->

<!-- Site Navbar Seach -->
<div class="collapse navbar-search-overlap" id="site-navbar-search">
  <form role="search">
    <div class="form-group">
      <div class="input-search">
        <i class="input-search-icon md-search" aria-hidden="true"></i>
        <input type="text" class="form-control" name="site-search" placeholder="Search...">
        <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
        data-toggle="collapse" aria-label="Close"></button>
      </div>
    </div>
  </form>
</div>
<!-- End Site Navbar Seach -->
</div>
</nav>    <div class="site-menubar">
  <div class="site-menubar-body">
    <div>
      <div>
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-category"></li>
          <li class="site-menu-item">
            <a class="animsition-link" href="<?= base_url('HomeAdmin/index')?>">
              <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
              <span class="site-menu-title">Dashboard</span>
            </a>
          </li>
          <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Produk</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('ProdukAdmin/index')?>">
                    <span class="site-menu-title">List Produk</span>
                  </a>
                </li>
              </ul>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('KategoriAdmin/index')?>">
                    <span class="site-menu-title">List Kategori</span>
                  </a>
                </li>
              </ul>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('UkuranAdmin/index')?>">
                    <span class="site-menu-title">List Ukuran</span>
                  </a>
                </li>
              </ul>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('WarnaAdmin/index')?>">
                    <span class="site-menu-title">List Warna</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
                <span class="site-menu-title">Order</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('Lembur/index')?>">
                    <span class="site-menu-title">List Confirm Order</span>
                  </a>
                </li>
              </ul>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?= base_url('Lembur/report')?>">
                    <span class="site-menu-title">Report</span>
                  </a>
                </li>
              </ul>
            </li>
            <!-- <li class="site-menu-item">
              <a class="animsition-link" href="<?= base_url('Penilaian/index')?>">
                <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
                <span class="site-menu-title">Penilaian Bawahan</span>
              </a>
            </li> -->
        </ul>
      </div>
    </div>
  </div>

</div>    <div class="site-gridmenu">
  <div>
    <div>
      <ul>
        <li>
          <a href="apps/mailbox/mailbox.html">
            <i class="icon md-email"></i>
            <span>Mailbox</span>
          </a>
        </li>
        <li>
          <a href="apps/calendar/calendar.html">
            <i class="icon md-calendar"></i>
            <span>Calendar</span>
          </a>
        </li>
        <li>
          <a href="apps/contacts/contacts.html">
            <i class="icon md-account"></i>
            <span>Contacts</span>
          </a>
        </li>
        <li>
          <a href="apps/media/overview.html">
            <i class="icon md-videocam"></i>
            <span>Media</span>
          </a>
        </li>
        <li>
          <a href="apps/documents/categories.html">
            <i class="icon md-receipt"></i>
            <span>Documents</span>
          </a>
        </li>
        <li>
          <a href="apps/projects/projects.html">
            <i class="icon md-image"></i>
            <span>Project</span>
          </a>
        </li>
        <li>
          <a href="apps/forum/forum.html">
            <i class="icon md-comments"></i>
            <span>Forum</span>
          </a>
        </li>
        <li>
          <a href="index.html">
            <i class="icon md-view-dashboard"></i>
            <span>Dashboard</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>