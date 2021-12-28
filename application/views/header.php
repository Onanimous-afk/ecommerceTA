<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Henna Twill</title>
    <link rel="icon" href="<?php echo base_url();?>assetfp/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/lightslider.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/nice-select.css"> -->
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assetfp/css/style.css">
    <style>
      .notif .badge {
        position: absolute;
        top: -10px;
        right: -10px;
        padding: 0.1vw 0.1vw;
        border-radius: 50%;
        background: #f13d80;
        color: white;
      }
    </style>
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>assetfp/img/logo.png" alt="logo"> </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo base_url();?>">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Shop
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                        <a class="dropdown-item" href="#"> shop category</a>
                                        <a class="dropdown-item" href="<?php echo base_url()?>Home/checkout">product checkout</a>
                                    </div>
                                </li>                              
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <?php if(!$this->session->userdata('id_user')){?>
                              <a href="<?php echo base_url();?>Account/Login"style="padding-left: 30px;cursor:pointer">
                                <label style="cursor:pointer"><b>LOGIN</b></label>
                              </a>
                            <?php }else{ ?>
                              
                                <div class="dropdown cart">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user"> </i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <div class="single_product">
                                        <a href="<?php echo base_url();?>Account/Profile"style="cursor:pointer">
                                            <label style="cursor:pointer;color:white !important"><i class="fas fa-user" style="margin-left:10px;margin-right:10px;color:white !important"> </i><b style="color:white !important;font-size:10pt;">Profile</b></label>
                                        </a>
                                        <br><a href="<?php echo base_url();?>Account/history_order"style="cursor:pointer">
                                            <label style="cursor:pointer;color:white !important"><i class="fas fa-history" style="margin-left:10px;margin-right:10px;color:white !important"> </i><b style="color:white !important;font-size:10pt;">History</b></label>
                                        </a>
                                        <br>
                                        <a href="<?php echo base_url();?>Account/Logout"style="cursor:pointer">
                                            <label style="cursor:pointer;color:white !important"><i class="fas fa-sign-out-alt" style="margin-left:10px;margin-right:10px;color:white !important"> </i><b style="color:white !important;font-size:10pt;">LOGOUT</b></label>
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>                            
                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus notif">
                                    <span class="badge"><?php echo $cartnotif?></span>
                                    </i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left:-400% !important;min-width:27rem !important">
                                    <div class="single_product">
                                        <?php if($cartnotif == 0){ ?>
                                            <span style="color:white;padding-left:10px;">Wah keranjang belanjaanmu kosong!</span>
                                        <?php }else{ ?>
                                                <a href="<?php echo base_url()?>Home/cart"><span style="color:white;padding-right:10px;float:right;">Lihat Sekarang</span></a>
                                                <br>
                                                <hr style="border-color:white">
                                            <?php foreach($cart as $item){?>
                                                <div style="color:white;padding-left:10px;overflow: hidden;">
                                                    <img src="<?php echo base_url();?>gambar_produk/<?php echo $item['pictures'];?>" style="width: 20%;height: 20%;margin-right: 15px;float: left;">
                                                    <h4 style="margin-left: 15px;display: block;margin: 2px 0 0 0; color:white !important;"><?php echo $item['product_name']?></h4>
                                                    <label style="margin-left: 15px;display: block;margin: 2px 0 0 0;font-size:8pt;"><?php echo $item['qty']?> Barang</label>
                                                    <h5 style="margin-right: 15px;display: block;margin: 0 4px 0 0;float:right;color:white !important;"><?php echo $item['total_price']?></h5>
                                                </div>
                                        <?php } } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->