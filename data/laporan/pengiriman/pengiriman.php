<?php
  // Skrip untuk melakukan reporting error
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>

<?php
require 'functions.php';


$pengiriman = query("SELECT * FROM tb_pengiriman
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
					INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
					
					");					


			
?>


<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>Dashboard Pengiriman All</h1>
				<hr>

            </div>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Pengiriman</th>
	  <th scope="col" class="text-center">Nama Lengkap</th>
	  <th scope="col" class="text-center">Nama Kedistributoran</th>
	  <th scope="col" class="text-center">Kategori Brand</th>
	  <th scope="col" class="text-center">Nama Barang</th>
	  <th scope="col" class="text-center">PCS</th>
	  <th scope="col" class="text-center">Berat/PCS</th>
	  <th scope="col" class="text-center">Berat Total</th>
	  <th scope="col" class="text-center">Tanggal Barang dikirim</th>
    <th scope="col" class="text-center">Status Barang</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($pengiriman as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_pengiriman"]; ?></td>
	  <td class="text-center"><?= $row ["nama_lengkap"]; ?></td>
	  <td class="text-center"><?= $row ["nama_perusahaan"]; ?></td>
	  <td class="text-center"><?= $row ["jenis_barang"]; ?></td>
	  <td class="text-center"><?= $row ["nama_barang"]; ?></td>
	  <td class="text-center"><?= $row ["pcs"]; ?></td>
	  <td class="text-center"><?= $row ["berat"]; ?></td>
	  <td class="text-center"><?= $row ["bertotal"]; ?></td>
	  <td class="text-center"><?= $row ["tanggal_kirim"]; ?></td>
    <td> 
  <?php if ($_SESSION['level'] == 'Admin' || $_SESSION['level'] == 'Kepala') { ?>
    <?php if ($row["status"] == 1) { ?>
      <label class="label label-warning">Sedang Dikirim</label>
      <a href="data/laporan/pengiriman/kirim_barang.php?id=<?= $row["id_pengiriman"] ?>" class="btn btn-sm btn-success">Kirim</a>
    <?php } else { ?>
      <label class="label label-success">Sudah Diterima</label>
    <?php } ?>
  <?php } else { ?>
    <?php if ($row["status"] == 1) { ?>
      <label class="label label-warning">Sedang Dikirim</label>
    <?php } else { ?>
      <label class="label label-success">Sudah Diterima</label>
    <?php } ?>
  <?php } ?>
</td>


    
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
<a ><button type="button" class="btn btn-default" data-toggle="modal" data-target="#cetakpdf" style="margin-top: 8px;"><i class="fa fa-print"> </i> ExportToPDF</button></a>

<?php
include "modal_cetakpdf.php";
?>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>

<br>
<br>
