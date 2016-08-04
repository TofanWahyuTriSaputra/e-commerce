<?php
include'../../koneksi.php';
if($_POST['id']) {
    $id = $_POST['id']; //escape string
    $query = "SELECT * FROM customer WHERE id_cust=$id";
    //print_r($query);
    $result = mysqli_query($conn, $query);
    $data_cust = mysqli_fetch_array($result);
    extract($data_cust);
    echo $data='
            <form role="form" action="customer/pro_edit_customer.php" method="post">
                <div class="form-group">
                            <label><span><i class="fa fa-user nama"></i> Nama Lengkap</span></label>
                            <input type="hidden" name="id" class="form-control" value="'.$id_cust.'">
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" placeholder="Nama Lengkap" required value="'.$nm_lengkap.'">
                </div>  
                <div class="form-group">
                    <label><span><i class="fa fa-home"></i> Alamat Lengkap</span></label>
                    <textarea class="form-control" name="alamat_jln" id="alamat" required placeholder="Alamat Lengkap">'.$alamat_jln.'</textarea>
                </div>                         
                <div class="form-group">
                    <label><span><i class="fa fa-globe"></i> Provinsi</span></label>
                        <select name="alamat_prov" class="form-control" value="'.$alamat_prov.'">
                            <option value="1">Yogyakarta</option>
                            <option value="2">Jateng</option>
                            <option value="3">Jatim</option>
                            <option value="4">Jabar</option>
                        </select>
                </div>    
                <div class="form-group">
                    <label><span><i class="fa fa-circle "></i> Kode Pos</span></label>
                    <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos"
                              required value="'.$kode_pos.'">
                </div>
                <div class="form-group">
                    <label><span><i class="fa fa-phone"></i> No Telepon</span></label>
                    <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Telepon"
                              required value="'.$telepon.'">
                </div>                       
                <div class="form-group">
                    <label><span><i class="fa fa-globe"></i> Kota</span></label>
 						<select name="kota" class="form-control" value="'.$id_kota.'">
 							<option value="1">Yogyakarta</option>
 							<option value="2">Solo</option>
 							<option value="3">Magelang</option>
 							<option value="4">Semarang</option>
 						</select>
                </div>  
                <div class="form-group">
                    <label><span><i class="fa fa-envelope"></i> Email</span></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="'.$email.'">  
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
