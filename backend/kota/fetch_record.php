<?php
include'../../koneksi.php';
if($_POST['id']) {
    $id = $_POST['id']; //escape string
    $query = "SELECT * FROM kota WHERE id_kota=$id";
    //print_r($query);
    $result = mysqli_query($conn, $query);
    $data_cust = mysqli_fetch_array($result);
    extract($data_cust);
    echo $data='
            <form role="form" action="kota/pro_edit_kota.php" method="post">
                <div class="form-group">
                            <label><span><i class="fa fa-globe"></i> Nama Kota</span></label>
                            <input type="hidden" name="id" class="form-control" value="'.$id_kota.'">
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_kota" placeholder="Nama kota" required value="'.$nm_kota.'">
                </div>     
                <div class="form-group">
                    <label><span><i class="fa fa-dollar "></i> Biaya Kirim</span></label>
                    <input type="text" class="form-control" name="ongkos" id="ongkos" placeholder="Biaya Kirim"
                              required value="'.$ongkos.'">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning btn-block"><span class="glyphicon glyphicon-off"></span> Update</button>
                </div>  
            </form>


    ';
    // Fetch Records
    // Echo the data you want to show in modal
 }
?>
