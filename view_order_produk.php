<?php 
	session_id();
	session_start();
	error_reporting(0);
if (empty($_SESSION['id_customer'])) {
	header('location:./');
}
	include'koneksi.php';
	$session = session_id();
//id_order_temp, id_produk, kd_produk, nm_produk,
	// qty_order, disc, harga_jual, nm_ukuran, ((harga_jual*disc+harga_jual)*qty_order) 
	 //AS total
	$query_view_order = "SELECT produk.id_produk, kd_produk, nm_produk, harga_jual, disc, id_order_temp,((harga_jual*disc+harga_jual+harga_ukuran)*qty_order) as total, session_order, qty_order, nm_ukuran, harga_ukuran from produk inner join order_tmp on (produk.id_produk = order_tmp.id_produk) inner join ukuran on (order_tmp.id_ukuran = ukuran.id_ukuran)" ;
	//print_r($query_view_order);die();
	$result = mysqli_query($conn, $query_view_order);
	$row = mysqli_num_rows($result);
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
 			<div class="col-md-8" >
 				<div class="thumbnail" align="left">

 						<h4 align="center"><strong><i class="fa fa-shopping-cart"></i> Daftar Belanja Anda</strong></h4><hr>
 					<?php 
 						if ($row > 0) {
	 						
				 			while ($data = mysqli_fetch_array($result)) {
						 			extract($data);
						 			//$disc = 10/100;
						 			$gtotal += $total;
			 		 ?>
 						<dl>
 							<span>
 							<strong> 
 								<?php echo $kd_produk;?> -- <?php echo $nm_produk;?> (Qty : <?php echo $qty_order;?>  | Disc : <?php echo $disc;?> |Size : <?php echo $nm_ukuran; ?>) <span class="pull-right"> Rp. <?php echo number_format($total,2);?> <a href="hapus_order_tmp.php?id=<?php echo $id_order_temp;?>"><button class="btn btn-danger"><i class="fa fa-trash-o"></i></button></a></span>
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

			 			echo("<div class='alert alert-danger' role='alert'><b><i class='fa fa-info-circle'></i> Daftar Belanja Masih Kosong</b></div>");
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
 			</div>

 			<div class="col-md-4">				
				<?php 
				//$k= array(,1,2,3);
				$r=rand(1, 13);
				$query = "SELECT id_produk, kd_produk, nm_produk, desk_produk, image, harga_jual FROM produk WHERE id_produk=$r AND kd_kategori=1 limit 1";
				//print_r($query);die(); //cek query error manual

$result = mysqli_query($conn, $query);
$no = 0;
//proses menampilkan data
while($data = mysqli_fetch_array($result)) {

	$no++;
?>
                    <div class="col-md-12">
                        <div class="thumbnail">
                        <h4 align="center"><strong><i class="fa fa-random"></i> Random Produk</strong></h4><hr>
      	                    <a href="view_produk.php?id=<?php echo $data['id_produk'];?>"> <img src="image/blazer/<?php echo  $data['image'];?>" alt=""></a> 
                            <div class="caption">
                                <h4 class="pull-right"> Rp.<?php echo $dt=number_format($data['harga_jual']);?></h4>
                                <h4><a href="view_produk.php?id=<?php echo $data['id_produk'];?>"> <?php echo $data['nm_produk'];?></a>
                                </h4>
                                <p> <?php echo $data['desk_produk'];?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
			
		<?php } ?>
 				
 			</div><!-- row6 -->
 		</div><!--row-->
 		
 	</div>