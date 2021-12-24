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
                                        <a class="dropdown-item" href="category.html"> shop category</a>
                                        
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        pages
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="checkout.html">product checkout</a>
                                        <a class="dropdown-item" href="cart.html">shopping cart</a>
                                        <a class="dropdown-item" href="confirmation.html">confirmation</a>
                                    </div>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                            <?php if(!$this->session->userdata('id_user')){?>
                              <a href="<?php echo base_url();?>Account/Login"style="padding-left: 30px;cursor:pointer">
                                <label style="cursor:pointer"><b>LOGIN</b></label>
                              </a>
                            <?php }else{ ?>
                              <a href="<?php echo base_url();?>Account/Logout"style="padding-left: 30px;cursor:pointer">
                                <label style="cursor:pointer"><b>LOGOUT</b></label>
                              </a>
                            <?php } ?>
                            <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>                            
                            <div class="dropdown cart">
                                <a class="dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cart-plus notif">
                                    <span class="badge"><?php echo $cartnotif?></span>
                                    </i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">

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