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
    <i class="fa fa-table"></i> Size
  </li>
</ol>

  <!-- <a href="#Add" data-toggle="modal"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button></a> -->
  <div class="table-responsive"><br>          
  <table class="table table-bordered table-striped table-hover table-heading example">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama Ukuran</th>
        <th>Harga Ukuran</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php 
        include'../koneksi.php';
        $query = "SELECT * 
                    FROM ukuran";
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
        <td><?php echo $data['id_ukuran']; ?></td>
        <td><?php echo $data['nm_ukuran']; ?></td>
        <td>Rp. <?php echo number_format($data['harga_ukuran']); ?></td>
        <td>
          <button class="btn btn-warning" data-toggle="modal" data-target="#ConfEditukuran" data-id="<?php echo $data['id_ukuran'];?>"><i class="fa fa-edit"></i></button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#confHapusukuran" data-href="ukuran/hapus_ukuran.php?id=<?php echo $data['id_ukuran'];?>"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
      <?php 
        };
       ?>
    </tbody>
  </table>
  </div>



      <!-- Modal Hapus -->
      <div class="modal fade" id="confHapusukuran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle"></i><strong> Yakin Hapus?</strong></h4>
              <p class="debug-url"></p>
            </div>
            <div class="modal-footer">
              <a class="btn btn-danger btn-ok" href="ukuran/hapus_ukuran.php?id=<?php echo $data['id_ukuran'];?>"><i class="fa fa-fw fa-power-off"></i> Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <!-- end modal hapus-->



<script type="text/javascript">

$('#confHapusukuran').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#ConfEditukuran').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'ukuran/fetch_record.php', //Here you will fetch records 
            data :  'id='+ rowid, //Pass $id
            success : function(data){
            $('.fetched-data').html(data);//Show fetched data from database
            }
        });
     });
});
</script>



<!-- Modal Edit-->
  <div class="modal fade" id="ConfEditukuran" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-resize-full"></span> Data Ukuran</h3>
        </div>
        <div class="modal-body">
          <div class="fetched-data">
          </div>
        </div>
      </div>
      
    </div>
  </div> 
<!--end Modal edit  -->


<!-- Modal Add>
  <div class="modal fade" id="Add" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
      <! Modal content>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="fa fa-globe"></span> Data Kota</h3>
        </div>
        <div class="modal-body">
            <form role="form" action="kota/pro_add_kota.php" method="post">
                <div class="form-group">
                            <label><span><i class="fa fa-globe"></i> Nama Kota</span></label>
                            <!<input type="hidden" name="id" class="form-control" value="'.$id_kota.'"> >
                            <input type="text" class="form-control" id="nm_kota" name="nm_kota" placeholder="Nama kota" required value="">
                </div>     
                <div class="form-group">
                    <label><span><i class="fa fa-dollar "></i> Biaya Kirim</span></label>
                    <input type="text" class="form-control" name="ongkos" id="ongkos" placeholder="Biaya Kirim"
                              required value="">
                </div>  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-off"></span> Add</button>
                </div>  
          </form>
        </div>
      </div>
      
    </div>
  </div> 
<!end Modal add  -->
