<?php
	include 'koneksi.php';
?>
<section class="main-content">

	<div class="row">
		<div class="span9">
			<ul class="thumbnails listing-products">
				
				<?php 
				$query = "SELECT id_produk, kd_produk, nm_produk, desk_produk, image, harga_jual FROM produk WHERE kd_kategori=1";
				//print_r($query);die(); cek query error manual

$result = mysqli_query($conn, $query);
$no = 0;
//proses menampilkan data
while($data = mysqli_fetch_array($result)) {

	$no++;
?>
                    <div class="col-sm-3 col-sm-3 col-sm-3 col-sm-3 ">
                        <div class="thumbnail">
                        <h4 align="center"><strong><i class="fa fa-star"></i> Blazer</strong></h4><hr>
      	                    <a href="view_produk.php?id=<?php echo $data['id_produk'];?>"> <img src="image/blazer/<?php echo  $data['image'];?>" alt=""></a> 
                            <div class="caption">
                                <h4 class="pull-right"> Rp.<?php echo $dt=number_format($data['harga_jual']);?></h5>
                                <h5><a href="view_produk.php?id=<?php echo $data['id_produk'];?>"> <?php echo $data['nm_produk'];?></a>
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
		
		</div>
	</div>
</section>
