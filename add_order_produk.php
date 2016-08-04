<?php 
	session_id();
	session_start();
if (empty($_SESSION['id_customer'])) {
	header('location:./');
}
	include'koneksi.php';

	$id = $_POST['product_id'];
	$qty = $_POST['jumlah'];
	$size = $_POST['ukuran'];
	$date = date('Y-m-d');
	$session = session_id();

	$query = "INSERT INTO order_tmp
				(session_order, qty_order, id_produk, id_ukuran, tgl_order)
				VALUES(
					'{$session}','{$qty}', '{$id}', {$size},'{$date}')
			";
	//print_r($query);die();
	mysqli_query($conn, $query) or die('ERROR SQL');
	header('location:view_order_produk.php');
 ?>