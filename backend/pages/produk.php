<?php 
if (empty($_SESSION['user']==1)) 
{
  header('location:index.php');
}
 ?>
                <?php 
                    include'../koneksi.php';
                    $query = "SELECT id_produk, kd_produk, nm_produk, desk_produk, image, nm_sablon, id_material, harga_jual, harga_beli,kd_kategori, tgl_masuk, balance, min_stok, max_stok, disc, berat
                                FROM produk";
                    $result = mysqli_query($conn, $query);
                    
                    $i = 0;
                 ?>
<ol class="breadcrumb">
  <li>
    <i class="fa fa-dashboard"></i>  <a href="index.php?p=dashboard">Dashboard</a>
  </li>                            
  <li class="active">
    <i class="fa fa-fw fa-folder-open"></i> Master
  </li>
  <li class="active">
    <i class="fa fa-table"></i> Produk
  </li>
</ol>
  <a href="#ConfAdd" data-toggle="modal"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button></a>       
            <div class="table-responsive">       
                <table class="table table-bordered table-striped table-hover table-heading example">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Kd Produk</th>
                      <th>Nama</th>
                      <th>Deskripsi</th>
                      <th>Gambar</th>
                      <th>Sablon</th>
                      <th>Bahan</th>
                      <th>Hrg Jual</th>
                      <th>Hrg Beli</th>
                      <th>Kd Kategori</th>
                      <th>Tgl Masuk</th>
                      <th>Stok</th>
                      <th>Stok Min</th>
                      <th>Stok Max</th>
                      <th>Disc(%)</th>
                      <th>Berat(kg)</th>
                      <th >Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      while ($data = mysqli_fetch_array($result)) 
                      {
                          $i++;
                     ?>
       
                    <tr>
                      <td><?php echo $data['id_produk']; ?></td>
                      <td><?php echo $data['kd_produk']; ?></td>
                      <td><?php echo $data['nm_produk']; ?></td>
                      <td><?php echo $data['desk_produk']; ?></td>
                      <td><a href="../image/produk/<?php echo  $data['image'];?>" target="_blank"><?php echo  $data['image'];?></a></td>
                      <td><?php echo $data['nm_sablon']; ?></td>
                      <td><?php echo $data['id_material']; ?></td>
                      <td>Rp <?php echo $dt=number_format($data['harga_jual']);?></td>
                      <td>Rp <?php echo $dt=number_format($data['harga_beli']);?></td>
                      <td><?php echo $data['kd_kategori']; ?></td>
                      <td><?php echo $data['tgl_masuk']; ?></td>
                      <td><?php echo $data['balance']; ?></td>
                      <td><?php echo $data['min_stok']; ?></td>
                      <td><?php echo $data['max_stok']; ?></td>
                      <td><?php echo $data['disc']; ?></td>
                      <td><?php echo $data['berat']; ?></td>
                      <td>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#ConfEdit" data-id="<?php echo $data['id_produk'];?>"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#confHapus" data-href="customer/hapus_customer.php?id=<?php echo $data['id_produk'];?>"><i class="fa fa-trash-o"></i></button>
                      </td>
                    </tr>

                    <?php 
                      }
                     ?>
                  </tbody>
                </table>


          </div>

      <!-- Modal Hapus -->
      <div class="modal fade" id="confHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle"></i><strong> Yakin Hapus?</strong></h4>
              <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
              <a class="btn btn-danger btn-ok" href="produk/hapus_produk.php?id=<?php echo $data['id_produk'];?>"><i class="fa fa-fw fa-power-off"></i> Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
            </div>
          </div>
        </div>
      </div>
<script type="text/javascript">

$('#confHapus').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#ConfEdit').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'produk/fetch_record.php', //Here you will fetch records 
            data :  'id='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
</script>



<!-- Modal Edit-->
  <div class="modal fade" id="ConfEdit" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-group"></span> Data Produk</h3>
        </div>
        <div class="modal-body">
          <div class="fetched-data">
          </div>
        </div>
      </div>
      
    </div>
  </div> 
<!--end Modal edit  -->


<!-- Modal Add-->
  <div class="modal fade" id="ConfAdd" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-group"></span> Data Produk</h3>
        </div>
        <div class="modal-body">
          <form role="form" action="produk/pro_add_produk.php" method="post">
            <div class="form-group">
              <label><span><i class="fa fa-user"></i> Kode Produk</span></label>
              <input type="text" class="form-control" id="kd_produk" name="kd_produk" placeholder="Kode Produk" required value="">
            </div>  
            <div class="form-group">
              <label><span><i class="fa fa-user"></i> Nama Produk</span></label>
              <input type="text" class="form-control" id="nm_produk" name="nm_produk" placeholder="Nama Produk" required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-home"></i> Deskripsi</span></label>
              <textarea class="form-control" name="desk" id="desk" required placeholder="Deskripsi"></textarea>
            </div>      
            <div class="form-group">
              <label><span><i class="fa fa-user"></i>Pilih Gambar</span></label>
              <input type="text" class="form-control" id="kd_produk" name="kd_produk" placeholder="Kode Produk" required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-user"></i> Sablon</span></label>
              <input type="text" class="form-control" id="kd_produk" name="kd_produk" placeholder="Kode Produk" required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-user"></i> Bahan</span></label>
              <input type="text" class="form-control" id="kd_produk" name="kd_produk" placeholder="Kode Produk" required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-circle "></i> Harga Jual</span></label>
              <input type="text" class="form-control" name="hrg_jual"  placeholder="Harga Jual"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> Harga Beli</span></label>
              <input type="text" class="form-control" name="hrg_beli"  placeholder="Harga Beli"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div>                       
            <div class="form-group">
              <label><span><i class="fa fa-globe"></i> Kategori</span></label>
              <select name="kota" class="form-control" value="">
                <option value="1">Jaket</option>
                <option value="2">Blazer</option>
                <option value="3">Kaos</option>
                <option value="4">Assesoris</option>
              </select>
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-user"></i> Tanggal Masuk</span></label>
              <input type="text" class="form-control" name="tgl_msk" placeholder="Tanggal Masuk" required value="<?php echo $t=date('Y-m-d'); ?>">
            </div>  
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> Stok</span></label>
              <input type="text" class="form-control" name="stok"  placeholder="Jumlah Stok"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div> 
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> Stok Minimal</span></label>
              <input type="text" class="form-control" name="min_stok"  placeholder="Jumlah stok minimal"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div> 
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> Stok Maksimal</span></label>
              <input type="text" class="form-control" name="max_stok"  placeholder="Jumlah stok maksimal"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div> 
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> Berat</span></label>
              <input type="text" class="form-control" name="berat"  placeholder="Berat Produk"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')" required value="">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Add</button>
            </div>  
          </form>
        </div>
      </div>
      
    </div>
  </div> 
<!--end Modal add  -->
