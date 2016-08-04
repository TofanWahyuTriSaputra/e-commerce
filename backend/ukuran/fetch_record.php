<?php
include'../../koneksi.php';
if($_POST['id']) {
    $id = $_POST['id']; //escape string
    $query = "SELECT * FROM ukuran WHERE id_ukuran=$id";
    //print_r($query);
    $result = mysqli_query($conn, $query);
    $data_cust = mysqli_fetch_array($result);
    extract($data_cust);
    echo $data='
            <form role="form" action="ukuran/pro_edit_ukuran.php" method="post">
                <div class="form-group">
                            <label><span><i class="glyphicon glyphicon-resize-full"></i> Nama Ukuran</span></label>
                            <input type="hidden" name="id" class="form-control" value="'.$id_ukuran.'">
                            <input type="text" class="form-control" id="nm_ukuran" name="nm_ukuran" placeholder="Nama Ukuran" required value="'.$nm_ukuran.'">
                </div>     
                <div class="form-group">
                    <label><span><i class="fa fa-dollar "></i> Harga Ukuran</span></label>
                    <input type="text" class="form-control" name="harga_ukuran" id="harga_ukuran" placeholder="Biaya ukuran"
                              required value="'.$harga_ukuran.'">
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
