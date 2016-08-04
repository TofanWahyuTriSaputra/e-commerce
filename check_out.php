<?php 
	session_id();
	session_start();
	error_reporting(0);
if (empty($_SESSION['user'])) {
	header('location:./');
}
	include'koneksi.php';

	$session = session_id();
	$query_view_order = "SELECT produk.id_produk, kd_produk,ukuran.id_ukuran, nm_produk, harga_jual, disc, id_order_temp,((harga_jual*disc+harga_jual+harga_ukuran)*qty_order) as total, session_order, qty_order, nm_ukuran, harga_ukuran from produk inner join order_tmp on (produk.id_produk = order_tmp.id_produk) inner join ukuran on (order_tmp.id_ukuran = ukuran.id_ukuran)" ;
	$result = mysqli_query($conn, $query_view_order);
	$row = mysqli_num_rows($result);

	$faktur = time();

	$tempJumlah = 0;
	$tempTotal  = 0;

	$sql = "INSERT INTO order_detail (no_faktur, id_produk, id_ukuran, qty_order, sub_total, disc) VALUES "; 	
	while ($data = mysqli_fetch_assoc($result)) {
		
		$tempJumlah += $data['qty_order'];
		$tempTotal  += $data['total'];

		$sql .= "('$faktur', '$data[id_produk]', '$data[id_ukuran]', '$data[qty_order]','$data[total]','$data[disc]'),"; 	
	}

	$tanggal = date('Y-m-d');
	$idCust  = $_SESSION['id_customer'];


/*--query untuk menampilkan informasi customer--*/
    $q_info_customer = "SELECT * FROM customer, kota 
             WHERE customer.id_kota=kota.id_kota 
             AND id_cust=$idCust";

    $hasil = mysqli_query($conn,$q_info_customer) or die($q_info_customer);
    $data_cust = mysqli_fetch_array($hasil);
          /*mendapatkan biaya pengiriman*/
          $kt= $data_cust['nm_kota'];
          $q_kota = "SELECT ongkos FROM kota WHERE nm_kota='$kt'";
          $r=mysqli_query($conn, $q_kota);
          $d_kota = mysqli_fetch_array($r);

            /* mendapatkan update orders*/
            $ongks=$d_kota['ongkos'];
            $q_update = "UPDATE orders SET grand_total = grand_total + $ongks WHERE no_faktur='$faktur'";


	//echo $tempTotal; die;
	//echo $sql = rtrim($sql,','); die;

	//echo "<br>";

	$orderSql = "INSERT INTO orders (no_faktur, tgl_order,id_cust,jumlah, grand_total,status) VALUES 
				('$faktur','$tanggal','$idCust','$tempJumlah','$tempTotal','belum')";
	
	//echo $orderSql;

	try {
			$detail = mysqli_query($conn,rtrim($sql,',')) or die(rtrim($sql,','));
			$order  = mysqli_query($conn,$orderSql) or die($orderSql);
            $hsl = mysqli_query($conn,$q_update) or die($q_update);
			if ($detail && $order && $hsl) {
				mysqli_query($conn,"TRUNCATE order_tmp");
				header('location:info_bayar.php');
			}
		} catch (Exception $e) {
			echo $e; 
		}

