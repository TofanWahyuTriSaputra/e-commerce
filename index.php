<?php 
session_start();
if (empty($_SESSION['user'])) 
{  
  include 'header.php';
  
}
else 
{
  include 'header_in.php';
  
}


 ?>



  <!-- <h4 align="right"><span> -->
  <!-- fungsi sapa pelanggan
  <SCRIPT language=JavaScript>var d = new Date();
               var h = d.getHours();
               if (h < 11) { document.write('Selamat Pagi dan Selamat Berbelanja !!!!'); }
               else { if (h < 15) { document.write('Selamat Siang dan Selamat Berbelanja !!!!'); }
               else { if (h < 19) { document.write('Selamat Sore dan Selamat Berbelanja !!!!'); }
               else { if (h <= 23) { document.write('Selamat Malam dan Selamat Berbelanja !!!!'); }
               }}}
  </SCRIPT>
</span></h4-->
<br>
<br>
<br>
<br>
<?php 
/*echo($_SESSION['user']); 
echo $_SESSION['id_customer'];*/
?>
<div class="container">
<div class="row">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><h4>Blazer</h4></a></li>
    <li><a data-toggle="tab" href="#menu1"><h4>Jaket</h4></a></li>
    <li><a data-toggle="tab" href="#menu2"><h4>Kaos</h4></a></li>
    <li><a data-toggle="tab" href="#menu3"><h4>Aksesoris</h4></a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Showing Blazer Category</h3>
      <?php 
          include('blazer.php');
       ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Showing Jacket Category</h3>
        <p>
          <?php include ('jaket.php'); ?>
        </p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Showing T-Shirt Category</h3>
      <p>
        <?php include ('kaos.php'); ?></p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Showing Accessories Category</h3>
      <p>
        <?php include ('aksesori.php'); ?>
      </p>
    </div>
  </div><!-- end content -->
  </div>
  

</div><!-- end container -->
<?php include'footer.php'; ?>

            <script type="text/javascript">
               $(document).ready(function() {
                    console.log('cek');
                    $('.example').DataTable();
                });
            </script>