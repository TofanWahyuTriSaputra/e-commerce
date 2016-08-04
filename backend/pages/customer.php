<?php 
if (empty($_SESSION['user']==1)) 
{
  header('location:index.php');
}
 ?>
<ol class="breadcrumb">
  <li>
    <i class="fa fa-dashboard"></i>  <a href="index.php?p=dashboard">Dashboard</a>
  </li>                            
  <li class="active">
    <i class="fa fa-fw fa-folder-open"></i> Master
  </li>
  <li class="active">
    <i class="fa fa-table"></i> Customer
  </li>
</ol>

  <a href="#ConfAdd" data-toggle="modal"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button></a>
  <div class="table-responsive"><br>          
  <table class="table table-bordered table-striped table-hover table-heading example">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama Lengkap</th>
        <th>Alamat</th>
        <th>Kode Pos</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Id Kota</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php 
        include'../koneksi.php';
        $query = "SELECT id_cust, nm_lengkap, alamat_jln, alamat_prov, kode_pos, email, telepon, id_kota
                    FROM customer";
        $result = mysqli_query($conn, $query);
        
        $i = 0;
     ?>
    <tbody>
    <?php 
      while ($data = mysqli_fetch_array($result)) 
      {
          $i++;
     ?>
      <tr>
        <td><?php echo $data['id_cust']; ?></td>
        <td><?php echo $data['nm_lengkap']; ?></td>
        <td><?php echo $data['alamat_jln'].$data['alamat_prov']; ?></td>
        <td><?php echo $data['kode_pos']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['telepon']; ?></td>
        <td><?php echo $data['id_kota']; ?></td>
        <td>
          <button class="btn btn-warning" data-toggle="modal" data-target="#ConfEdit" data-id="<?php echo $data['id_cust'];?>"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#confHapus" data-href="customer/hapus_customer.php?id=<?php echo $data['id_cust'];?>"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
      <?php 
        };
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
              <a class="btn btn-danger btn-ok" href="customer/hapus_customer.php?id=<?php echo $data['id_cust'];?>"><i class="fa fa-fw fa-power-off"></i> Ya</a>
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
            url : 'customer/fetch_record.php', //Here you will fetch records 
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
          <h4><span class="fa fa-group"></span> Data Customer</h3>
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
          <h4><span class="fa fa-group"></span> Data Customer</h3>
        </div>
        <div class="modal-body">
          <form role="form" action="customer/pro_add_customer.php" method="post">
            <div class="form-group">
              <label><span><i class="fa fa-user nama"></i> Nama Lengkap</span></label>
              <!-- <input type="hidden" name="id" class="form-control" value="'.$id_cust.'"> -->
              <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" placeholder="Nama Lengkap" required value="">
            </div>  
            <div class="form-group">
              <label><span><i class="fa fa-home"></i> Alamat Lengkap</span></label>
              <textarea class="form-control" name="alamat" id="alamat" required placeholder="Alamat Lengkap"></textarea>
            </div>      
            <div class="form-group">
              <label><span><i class="fa fa-circle "></i> Kode Pos</span></label>
              <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Kode Pos"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                              required value="">
            </div>
            <div class="form-group">
              <label><span><i class="fa fa-phone"></i> No Telepon</span></label>
              <input type="text" class="form-control" name="telepon" id="telepon" placeholder="No Telepon"
               onkeypress="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
               onkeyup="if(this.value.match(/\D/)) this.value=this.value.replace(/\D/g,'')"
                              required value="">
            </div>                       
            <div class="form-group">
              <label><span><i class="fa fa-globe"></i> Kota</span></label>
              <select name="kota" class="form-control" value="">
                <option value="1">Yogyakarta</option>
                <option value="2">Solo</option>
                <option value="3">Magelang</option>
                <option value="4">Semarang</option>
              </select>
            </div>  
            <div class="form-group">
              <label><span><i class="fa fa-envelope"></i> Email</span></label>
              <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="">  
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
