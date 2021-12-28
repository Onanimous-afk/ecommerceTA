<!--================ confirmation part start =================-->
<section class="confirmation_part padding_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <?php if($orderdetail[0]['status'] == 0){?>
                <span>Thank you. Your order has been received.</span>
            <?php }else if($orderdetail[0]['status'] == 2){?>
                <span>Your Order is being process.</span>
            <?php }else if($orderdetail[0]['status'] == 1){?>
                <span>successfully uploaded proof of transfer</span>
            <?php } else if($orderdetail[0]['status'] == 3){ ?>
                <span>Your order is on the way</span>
            <?php } else{?>
                <span>Your Order has been Finished</span>
            <?php }?>
            
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <ul>
              <li>
                <p>order number</p><span>: <?php echo $orderdetail[0]['order_no']?></span>
              </li>
              <li>
                <p>date</p><span>: <?php echo $orderdetail[0]['order_date']?></span>
              </li>
              <li>
                <p>total</p><span>: <?php $totalprice = "Rp " . number_format( $orderdetail[0]['total_pembayaran'],2,',','.'); echo $totalprice;?></span>
              </li>
              <li>
                <p>payment method</p><span>: Bank Transfer</span>
              </li>
              <?php if($orderdetail[0]['status'] == 3){?>
                    <li>
                        <p>Resi Number</p><span>: <b><?php echo $orderdetail[0]['resi_number']?></b></span>
                    </li>
                    <li>
                        <p>Delivery Date</p><span>: <b><?php echo $orderdetail[0]['delivery_date']?></b></span>
                    </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>INFO!!</h4>
            <?php if($orderdetail[0]['status'] <= 1){?>
            <p>
                Silahkan transfer ke nomor rekening 123546 A.N ADMIN Bank BRI dalam kurun waktu 24 Jam
                <br>
                Jika sudah silahkan upload bukti transfer pada inputan dibawah ini
            </p>
            <form method="post" action="<?php echo base_url()?>Home/UploadImageConfirm" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $id_order; ?>" name="id_order">
                <div>
                    <label for="userfile">Select a file:</label>
                    <input type="file" id="userfile" name="userfile"> 
                </div>
                <button type="submit" class="genric-btn success circle">Upload</button>
                
            </form>
            <?php }else if($orderdetail[0]['status'] == 2){?>
                <p>
                    Your order is being process.
                </p>
            <?php } else if($orderdetail[0]['status'] == 3){ ?>
                <p>
                    Your order is on the way
                </p>
                <form method="post" action="<?php echo base_url()?>Home/TerimaPaket">
                    <input type="hidden" value="<?php echo $id_order; ?>" name="id_order">
                    <button type="submit" class="genric-btn success circle">Paket Sudah Sampai?</button>
                    
                </form>
            <?php } else{?>
                <p>
                    Your Order has been Finished
                </p>
            <?php }?>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>shipping Address</h4>
            <ul>
              <li>
                <p>Street</p><span>: <?php echo $orderdetail[0]['address']?></span>
              </li>
              <li>
                <p>province</p><span>: <?php echo $orderdetail[0]['province_name']?></span>
              </li>
              <li>
                <p>city</p><span>: <?php echo $orderdetail[0]['city_name']?></span>
              </li>
              <li>
                <p>postcode</p><span>: <?php echo $orderdetail[0]['zipcode']?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                    <?php $subtotal = 0; $qtyorder = 0; foreach($orderdetail as $item){?>
                        <tr>
                        <th colspan="2"><span><?php echo $item['product_name']?> Size <?php echo $item['size_name']?> Color <?php echo $item['color_name']?></span></th>
                            <th>X<?php echo $item['qtyorder'];$qtyorder +=$item['qtyorder'];?></th>
                            <th> <span><?php $totalprice = "Rp " . number_format( $item['total'],2,',','.'); echo $totalprice; $subtotal += $item['total']?></span></th>
                        </tr>
                    <?php }?>
                <tr>
                  <th colspan="3">Subtotal</th>
                  <th> <span><?php $totalsubtotal = "Rp " . number_format( $subtotal,2,',','.'); echo $totalsubtotal;?></span></th>
                </tr>
                <tr>
                  <th colspan="3">shipping</th>
                  <th><span><?php $ongkirs = "Rp " . number_format( $item['ongkir'],2,',','.'); echo $ongkirs; $totalAll =$subtotal + $item['ongkir'];?></span></th>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="3">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
                <tr>
                  <th scope="col" colspan="3"><?php echo $qtyorder;?> Barang</th>
                  <th scope="col"><?php $totalalls = "Rp " . number_format( $totalAll,2,',','.'); echo $totalalls;?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ confirmation part end =================-->