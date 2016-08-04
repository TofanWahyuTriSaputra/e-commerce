<?php 
if (empty($_SESSION['user']==1)) 
{
  header('location:../../index.php');
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
    <i class="fa fa-table"></i> User
  </li>
</ol>

  <a href="tambah_karyawan.php"><button type="button" class="btn btn-primary">Tambah Baru</button></a>
  <div class="table-responsive"><br>         
  <table class="table table-bordered table-striped table-hover table-heading example ">
    <thead>
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Level</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>
    <?php 
        include'../koneksi.php';
        $query = "SELECT *
                    FROM admin";
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
        <td><?php echo $data['id_usr']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['level']; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $data['id_usr']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
          <a href="hapus.php?id=<?php echo $data['id_usr']; ?>"><button type="button" class="btn btn-danger">Hapus</button></a>
        </td>
      </tr>
      <?php 
        };
       ?>
    </tbody>
  </table>
  </div>
  