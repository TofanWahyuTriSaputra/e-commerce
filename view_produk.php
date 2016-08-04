<?php   
session_start();	
if (empty($_SESSION['user'])) 
{  
  include 'header.php';
}
else 
{
  include 'header_in.php';
}
include 'koneksi.php';
	$orderid = $_REQUEST['id'];
	$view_order = "SELECT id_produk,kd_produk, nm_produk, desk_produk, image, balance,
			   		harga_jual FROM produk WHERE id_produk = {$orderid}";//print_r($view_order);die();
	$query_view_order = mysqli_query($conn, $view_order);
	$view = mysqli_fetch_array($query_view_order);
	$no = $view['kd_produk'] ;
	$name = $view['nm_produk'];
	$desc = $view['desk_produk'];
	$price = number_format($view['harga_jual'], 2) ;
 ?>
<br>
<br>
<br>
<br>
<form action="add_order_produk.php" method="POST">
	 <div class="container">
	 	<div class="row prod-head">
	 		<div class="col-sm-9">
	 			<h1 itemprop="name"><?php echo $view['nm_produk']; ?></h1>
	 		</div>   
		</div>
	 	<div class="row">
	    	<div class="col-sm-4"> 
	<!-- show image-->
	            <p align="center">
	            	<a class="group1 cboxElement" href="image/produk/<?php echo $view['image']; ?>" title="<?php echo $view['nm_produk']; ?>"><img itemprop="image" src="image/produk/<?php echo $view['image']; ?>" alt="">
	            	</a>
	            </p>	  
	            <hr>     		  
	        </div>
	                        	
	        <div class="col-sm-6">
				<div class="row stock-share">
					<div class="">
	                    <h4 itemprop="Detail">Detail Produk</h4>
						<dl class="dl-horizontal">
		                        <!--dt>Brand:</dt><dd><a href="#">Crows Denim</a></dd-->
		                        <dt itemprop="price">Harga :</dt>
									<dd>Rp <?php echo $dt=number_format($view['harga_jual'],2);?></dd>
								
		                        <dt>Product Code :</dt>
		                        	<dd class="kodenya" ><?php echo $view['kd_produk']; ?></dd>
		                        <dt itemprop="availability">Availability :</dt>
		                        	<dd><?php echo $view['balance']; ?></dd><!--stok properti-->
	                            <dt>Material :</dt>
									<dd>?</dd>
	                            <dt>Sablon :</dt>
									<dd>?</dd>
	                  	</dl>
	                </div>
	            		  
			   		<p itemprop="description"></p><h4>Deskripsi</h4><p><br></p>
				   			<dl class="dl-horizontal">
				   				<?php echo $view['desk_produk'];?>				   				
				   			</dl>		  
			        <div id="product">
			                        <hr>
						
				            <div class="form-horizontal">		            	
					            <div class="form-group required">	
					            	<label class="control-label col-sm-2" for="input-option253">Ukuran</label>
					            		<div class="col-sm-6">
					            			<select name="ukuran" id="input-option253" class="form-control"><!-- 
						                        <option value="0"></option> -->
						                        <option value="1">S (Small)</option> <!--173-->
						                        <option value="2">M (Medium)</option>
						                        <option value="3">L (Large)</option>
						                        <option value="4">XL (Ekstra Large)</option>
						                        <option value="5">XXL (Double Ekstra Large)(+IDR 15,000)</option>
						                        <option value="6">XXXL (Triple Extra Large)(+IDR 20,000)</option>
					                        </select>	  
										</div>
				          		</div>
							</div>
						<br>
						<div class="form-horizontal">
				            <div class="form-group required">
					              <label class="control-label col-sm-2 " for="input-quantity">Qty</label>
						              <div class="col-sm-6"><input name="jumlah" value="1" size="2" id="input-quantity" class="form-control jumlahnya" type="text">
						              </div>
					              <input name="product_id" value="<?php echo $view['id_produk']; ?>" type="hidden">
					              <br>
				            </div>
							<div class="form-group">			
				            	<div class="col-md-8">
				            	<?php if (empty($_SESSION['id_customer'])) 
										{
										  echo('<a href="#" data-toggle="modal" data-target="#modalLogin"><button class="btn btn-primary btn-lg pull-right"><i class="fa fa-shopping-cart"></i> Pesan Sekarang</button></a>');
										}
										else 
										{
											echo('<button type="submit" class="btn btn-primary btn-lg pull-right">
												<i class="fa fa-shopping-cart"></i> Pesan Sekarang
												</button>')	;
										 } ?>
								</div>
							</div>
						</div><!--form-horizontal-->
					</div><!--product-->
		        </div><!--row-stock-share-->

	        </div><!--col-sm-6-->
	    </div><!-- row -->
	      
	</div><!--end container-->
</form>
