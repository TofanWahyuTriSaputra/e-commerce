<?php 
	session_id();
	session_start();
	error_reporting(0);

	include'koneksi.php';
 if (empty($_SESSION['user'])) 
{  
  include 'header.php';
}
else 
{
  include 'header_in.php';
}
 ?>
 <br>
 <br>
 <br>
 <br>
 	<div class="container-fluid"> 		
 		<div class="row">
 			<div class="col-md-6">
 				<div class="col-md-12">
 					 
 					<?php 
 						$id_customer = $_SESSION['id_customer'];
 						$q_view_customer = "SELECT * FROM customer WHERE id_cust={$id_customer}";
 						//print_r($q_view_customer);die();
 						$hasil = mysqli_query($conn, $q_view_customer);
 						while ($dt = mysqli_fetch_array($hasil)) {
 							extract($dt);
 					?>

 					<form class="form-horizontal">	
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> Nama Lengkap</span></label>
 							<input type="text" class="form-control" name="nm_lengkap" placeholder="Nama Lengkap" required value="<?php echo $nm_lengkap; ?>">
 						</div>	
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> Alamat Lengkap</span></label>
 							<textarea class="form-control" name="alamat" required placeholder="Alamat Lengkap"><?php echo $alamat; ?></textarea>
 						</div>		
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> Kode Pos</span></label>
 							<input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos"
 							 onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
 							 onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
 							  required value="<?php echo $kode_pos; ?>">
 						</div>
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> No Telepon</span></label>
 							<input type="text" class="form-control" name="telepon" placeholder="No Telepon"
 							 onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
 							 onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
 							  required value="<?php echo $telepon; ?>">
 						</div>	
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> Email</span></label>
 							<input type="email" class="form-control" name="email" placeholder="Email" required value="<?php echo $email; ?>">
 						</div> 						
 						<div class="form-group">
 							<label><span><i class="fa fa-user"></i> Kota</span></label>
 							<select name="kota" class="form-control" value="">
 								<option value="1" <?php echo ($id_kota==1) ?  'selected' : '' ;?>>Yogyakarta</option>
 								<option value="2" <?php echo ($id_kota==2) ?  'selected' : '' ;?>>Solo</option>
 								<option value="3" <?php echo ($id_kota==3) ?  'selected' : '' ;?>>Magelang</option>
 								<option value="4" <?php echo ($id_kota==4) ?  'selected' : '' ;?>>Semarang</option>
 							</select>
 						</div>
 					</form>
 					<?php } ?>
 				</div>
 			</div>
 			<div class="col-md-6" >
 				<div class="thumbnail" align="left">

 						<h4 align="center"><strong><i class="fa fa-shopping-cart"></i> Review Belanja Anda</strong></h4><hr>
 					<?php  					
						$session = session_id();
						$query_view_order = "SELECT produk.id_produk, kd_produk, nm_produk, harga_jual, disc, id_order_temp, ((harga_jual*disc+harga_jual+harga_ukuran)*qty_order) as total, session_order, qty_order, nm_ukuran, harga_ukuran 
						from produk inner join order_tmp on (produk.id_produk = order_tmp.id_produk) 
							inner join ukuran on (order_tmp.id_ukuran = ukuran.id_ukuran)" ;
						//print_r($query_view_order);die();
						$result = mysqli_query($conn, $query_view_order);
						$row = mysqli_num_rows($result);
 						if ($row > 0) {
	 						
				 			while ($data = mysqli_fetch_array($result)) {
						 			extract($data);
						 			//$disc = 10/100;
						 			$gtotal += $total;
			 		 ?>
 						<dl>
 							<span>
 							<strong> 
 								<?php echo $kd_produk;?> -- <?php echo $nm_produk;?> (Qty : <?php echo $qty_order;?>  | Disc : <?php echo $disc;?> |Size : <?php echo $nm_ukuran; ?>) <span class="pull-right"> Rp. <?php echo number_format($total,2);?>
 							</strong>
 							</span>
 						</dl>	
 					<?php
			 				}//end while
			 		?>
			 			<dl>
			 				<hr>
			 				<strong>Total<span class="pull-right">Rp. <?php echo number_format($gtotal,2);?>
			 			</dl>
			 		<?php	
			 			}
			 			else {

			 			echo("<div class='alert alert-danger'><strong> Daftar Belanja Masih Kosong </strong></div>");
			 			}
			 		?>
 				</div>

	 		<div>
				<a class='btn btn-primary btn-large' href='javascript:history.go(-2)'><i class="fa fa-shopping-cart"></i> Belanja Produk Lagi</a>
				<span class="pull-right">
				<?php if ($row>0) {
					echo("
				<a class='btn btn-success btn-large' href='check_out.php'><i class='fa fa-share'></i> Check-Out</a></span>");
				} ?>
					
				<?php ?>
			</div>
 			</div><!-- col -->

 		</div><!--row-->
 		
 	</div>