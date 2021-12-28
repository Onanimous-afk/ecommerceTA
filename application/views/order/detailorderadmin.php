
<div class="page">
	<div class="page-content">
		<div class="panel">
			<header class="panel-heading">
				<div class="panel-actions"></div>
			</header>
			<div class="panel-body container-fluid">
				<form method="POST" action="<?php echo $action;?>">
					<input type="hidden" value="<?php echo $orderdetail[0]['id_order']; ?>" name="id_order">
					<div class="row row-lg" style="margin-top: 3%;">
						<div class="col-md-5" style="background-color:white;box-shadow: 0px 0px 10px 1px #d5d5d5;border-radius:5px;margin-right:10px;margin-left:10px;">
						<h4 style="padding-top:10px">Order Info</h4>
						<ul>
							<li>
								Order Number<span>: <?php echo $orderdetail[0]['order_no']?></span>
							</li>
							<li>
								Date<span>: <?php echo $orderdetail[0]['order_date']?></span>
							</li>
							<li>
								Total<span>: <?php $totalprice = "Rp " . number_format( $orderdetail[0]['total_pembayaran'],2,',','.'); echo $totalprice;?></span>
							</li>
							<li>
								Payment Method<span>: Bank Transfer</span>
							</li>
							<li>
								Status<span>: <b><?php echo $status?></b></span>
							</li>
							<?php if($orderdetail[0]['status'] == 3){?>
								<li>
									Resi Number<span>: <b><?php echo $orderdetail[0]['resi_number']?></b></span>
								</li>
								<li>
									Delivery Date<span>: <b><?php echo $orderdetail[0]['delivery_date']?></b></span>
								</li>
							<?php } ?>
							
						</ul>
						</div>
						<div class="col-md-6" style="background-color:white;box-shadow: 0px 0px 10px 1px #d5d5d5;border-radius:5px;">
							<h4 style="padding-top:10px">Payment Info</h4>
							<ul>
								<li>
									Bank Name<span>: <?php echo $orderdetail[0]['bank_name']?></span>
								</li>
								<li>
									Account Number<span>: <?php echo $orderdetail[0]['account_number']?></span>
								</li>
								<li>
									Account Name<span>: <?php echo $orderdetail[0]['account_name']?></span>
								</li>
							</ul>
							<img src="<?php echo base_url()?>gambar_confirm/<?php echo $orderdetail[0]['payment_picture']?>" style="max-width: 100%;max-height: 100%;">
						</div>
						<div class="col-md-12" style="background-color:white;box-shadow: 0px 0px 10px 1px #d5d5d5;border-radius:5px;margin-top:20px;">
							<h3 style="padding-top:10px">Order Details</h3>
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
								<th colspan="3">Shipping</th>
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
						<?php if($orderdetail[0]['status'] == 2){?>
							<div class="col-md-12" style="background-color:white;box-shadow: 0px 0px 10px 1px #d5d5d5;border-radius:5px;margin-top:20px;padding-bottom:20px;">
								<h4 style="padding-top:10px">Delivery Info</h4>
								<div class="row row-lg" style="margin-top: 3%;">
									<div class="col-md-12">
										<h4 class="example-title">Nomor Resi</h4>
										<input type="text" name="resi" class="form-control col-md-6" required="required" placeholder="Input Nomor Resi" >
									</div>
									<div class="col-md-12" style="padding-top:10px;">
										<h4 class="example-title">Tanggal Pengiriman</h4>
										<input class="form-control datepickers col-md-6" type="text" id="delivery_date" name="delivery_date" placeholder="Masukkan tanggal pengiriman" required="required">
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<?php if($orderdetail[0]['status'] <= 2){?>
						<button type="submit" class="btn btn-block btn-success waves-effect waves-classic col-md-1" style="margin-top: 3%">Submit</button>
					<?php } ?>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>