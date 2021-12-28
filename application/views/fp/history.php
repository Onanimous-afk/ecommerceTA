<section class="checkout_area padding_top">
    <div class="container">
    <div class="billing_details">
        <div class="row">
            <div class="section-top-border" style="width:100%">
                <div class="row col-md-12">
                    <h3 class="mb-30">Order List</h3>
                    <!-- <button type="button" class="genric-btn success medium mb-30 radius" style="margin-left: 65%;"  data-toggle="modal" data-target="#exampleModal">Tambah alamat baru</button> -->
                </div>
				
				<div class="row">
					<div class="col-lg-12">
                        <?php if(count($order) > 0){?>
                            <?php foreach($order as $item){?>
                                <blockquote class="generic-blockquote" <?php if ($item['status'] == 2){ echo "style='border-left: 2px solid #ffdf33 !Important;'"; }else if ($item['status'] > 2){ echo "style='border-left: 2px solid #33ff36 !Important;'"; }?> >
                                    <p>
                                        <span>Order Number : </span><?php echo $item['order_no']?>
                                        <br>
                                        <span>Order Date : </span><?php echo $item['order_date']?>
                                        <br>
                                        <?php if($item['status'] == 0){?>
                                            <span>Waiting for Payment</span>
                                        <?php }else if($item['status'] == 2){?>
                                            <span>Your Order is being process.</span>
                                        <?php }else if($item['status'] == 1){?>
                                            <span>Waiting for Seller Confirmation</span>
                                        <?php } else if($item['status'] == 3){ ?>
                                            <span>Your order is on the way</span>
                                        <?php } else{?>
                                            <span>Your Order has been Finished</span>
                                        <?php }?>
                                        <br><br>
                                        <a href="<?php echo base_url()?>Home/confirmation/<?php echo $item['id_order']?>" class="genric-btn info radius medium">See Detail</a>
                                    </p>
                                </blockquote>
                            <?php } ?>
                        <?php } else{?>
                            <blockquote class="generic-blockquote">
                                Upss... Tidak ada History belanja  
                            </blockquote>
                        <?php } ?>
						
					</div>
			</div>
          </div>
          
        </div>
      </div>
    </div>
</section>