

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_slider owl-carousel">
                        <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>HIJABU <br>
                                                Cloth & Hijab</h1>
                                            <p>Makin nyaman beraktivitas harian dengan Koleksi Setelan Elzatta. Rangkaian busana satu set yang terdiri dari tunik dan celana berbahan nyaman dan hadir dengan ragam warna cantik menambah rasa percaya diri ke manapun melangkah.</p>
                                            <!-- <a href="#" class="btn_2">buy now</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="<?php echo base_url();?>assetfp/img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div><div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>HIJABU <br>
                                                Cloth & Hijab</h1>
                                            <p>Makin nyaman beraktivitas harian dengan Koleksi Setelan Elzatta. Rangkaian busana satu set yang terdiri dari tunik dan celana berbahan nyaman dan hadir dengan ragam warna cantik menambah rasa percaya diri ke manapun melangkah.</p>
                                            <!-- <a href="#" class="btn_2">buy now</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="<?php echo base_url();?>assetfp/img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div><div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>HIJABU <br>
                                                Cloth & Hijab</h1>
                                            <p>Makin nyaman beraktivitas harian dengan Koleksi Setelan Elzatta. Rangkaian busana satu set yang terdiri dari tunik dan celana berbahan nyaman dan hadir dengan ragam warna cantik menambah rasa percaya diri ke manapun melangkah.</p>
                                            <!-- <a href="#" class="btn_2">buy now</a> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="<?php echo base_url();?>assetfp/img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single_banner_slider">
                            <div class="row">
                                <div class="col-lg-5 col-md-8">
                                    <div class="banner_text">
                                        <div class="banner_text_iner">
                                            <h1>Cloth $ Wood Sofa</h1>
                                            <p>Incididunt ut labore et dolore magna aliqua quis ipsum
                                                suspendisse ultrices gravida. Risus commodo viverra</p>
                                            <a href="#" class="btn_2">buy now</a> 
                                        </div>
                                    </div>
                                </div>
                                <div class="banner_img d-none d-lg-block">
                                    <img src="<?php echo base_url();?>assetfp/img/banner_img.png" alt="">
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="slider-counter"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->    

    <!-- product_list start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>awesome <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_list_slider owl-carousel">
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <?php foreach($dataeight1 as $item){?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <img src="<?php echo base_url();?>gambar_produk/<?php echo $item['pictures']?>" alt="">
                                            <div class="single_product_text">
                                                <a style="visibility: visible !important;opacity: 1 !important;" href="<?php echo base_url();?>Home/detail_product/<?php echo $item['id_product']?>"><h4><?php echo $item['product_name']?></h4></a>
                                                    <h5>Start from Rp.<?php echo $item['price']?></h5>
                                                <a href="<?php echo base_url();?>Home/detail_product/<?php echo $item['id_product']?>" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>                                
                            </div>
                        </div>
                        <div class="single_product_list_slider">
                            <div class="row align-items-center justify-content-between">
                                <?php foreach($dataeight2 as $item){?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="single_product_item">
                                            <img src="<?php echo base_url();?>gambar_produk/<?php echo $item['pictures']?>" alt="">
                                            <div class="single_product_text">
                                                <a style="visibility: visible !important;opacity: 1 !important;" href="<?php echo base_url();?>Home/detail_product/<?php echo $item['id_product']?>"><h4><?php echo $item['product_name']?></h4></a>
                                                    <h5>Start from Rp.<?php echo $item['price']?></h5>
                                                <a href="<?php echo base_url();?>Home/detail_product/<?php echo $item['id_product']?>" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part start-->

    <!-- product_list part start-->
    <section class="product_list best_seller section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="section_tittle text-center">
                        <h2>Best Sellers <span>shop</span></h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-12">
                    <div class="best_product_slider owl-carousel">
                        <div class="single_product_item">
                            <img src="<?php echo base_url();?>assetfp/img/product/product_1.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="<?php echo base_url();?>assetfp/img/product/product_2.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="<?php echo base_url();?>assetfp/img/product/product_3.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="<?php echo base_url();?>assetfp/img/product/product_4.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                        <div class="single_product_item">
                            <img src="<?php echo base_url();?>assetfp/img/product/product_5.png" alt="">
                            <div class="single_product_text">
                                <h4>Quartz Belt Watch</h4>
                                <h3>$150.00</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product_list part end-->


    