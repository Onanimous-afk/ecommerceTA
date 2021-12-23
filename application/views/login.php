<!doctype html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Henna Twill</title>
    <link rel="icon" href="<?php echo base_url(); ?>assetfp/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/owl.carousel.min.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/all.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/themify-icons.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/slick.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assetfp/css/style.css">
</head>

<body>
    <!--::header part start::-->
    
    <!-- Header part end-->


    <!-- breadcrumb start-->
   
    <!-- breadcrumb start-->

    <!--================login_part Area =================-->
    <section class="login_part padding_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2><span style="color:transparent">aaa</span>New to our Shop?<span style="color:transparent">aaas</span></h2>
                            <!-- <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p> -->
                            <a href="<?php echo base_url();?>account/register" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <?php if($this->session->flashdata('alert')): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <div class="fa fa-info-circle"></div>&nbsp;<?php echo $this->session->flashdata('alert'); ?>
                                </div>
                            <?php endif; ?>
                            <form class="row contact_form" action="<?php echo base_url('Account/check_login');?>" autocomplete="off" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="name" name="email" value=""
                                        placeholder="Email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value=""
                                        placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <!-- <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div> -->
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->

    <!--::footer_part start::-->
    <footer class="footer_part">
        
        <div class="copyright_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="copyright_text">
                            <P><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></P>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="footer_icon social_icon">
                            <ul class="list-unstyled">
                                <li><a href="#" class="single_social_icon"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fas fa-globe"></i></a></li>
                                <li><a href="#" class="single_social_icon"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--::footer_part end::-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo base_url(); ?>assetfp/js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo base_url(); ?>assetfp/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url(); ?>assetfp/js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url(); ?>assetfp/js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url(); ?>assetfp/js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?php echo base_url(); ?>assetfp/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.nice-select.min.js"></script>
    <!-- slick js -->
    <script src="<?php echo base_url(); ?>assetfp/js/slick.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/contact.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.form.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/mail-script.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/stellar.js"></script>
    <script src="<?php echo base_url(); ?>assetfp/js/price_rangs.js"></script>
    <!-- custom js -->
    <script src="<?php echo base_url(); ?>assetfp/js/custom.js"></script>
</body>

</html>