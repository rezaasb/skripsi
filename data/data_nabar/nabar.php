<?php
require 'functions.php';

$nabar = query("SELECT * FROM tb_nabar
				INNER JOIN tb_barang ON tb_nabar.id_barang = tb_barang.id_barang
				");
							
			
?>

<div class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
			 <div class="box-header">
              <div class="text-center">
				<h1>Data Barang</h1>
				<hr>
            </div>
              <a href="?page=nabar&aksi=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah Data</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col" class="text-center">NO</th>
      <th scope="col" class="text-center">Id Barang</th>
      <th scope="col" class="text-center">Kategori Brand</th>
	  <th scope="col" class="text-center">Nama Barang</th>
	  <th scope="col" class="text-center">Aksi</th>
	  </tr>
  </thead>
  <tbody>
	<?php $i = 1; ?>
    <?php foreach ($nabar as $row): ?>
	<tr>
      <td class="text-center"><?= $i; ?></td>
      <td class="text-center"><?= $row ["id_nabar"]; ?></td>
	  <td class="text-center"><?= $row ["jenis_barang"]; ?></td>
	  <td class="text-center"><?= $row ["nama_barang"]; ?></td>
	   
	  <td class="text-center">
		<a href="?page=nabar&aksi=ubah&id_nabar=<?= $row ["id_nabar"]; ?>" class="btn btn-success btn-xs">Ubah<a>
	    <a href="?page=nabar&aksi=hapus&id_nabar=<?= $row ["id_nabar"]; ?>"  onclick=" return confirm('Yakin data ingin dihapus!!!');" class="btn btn-danger btn-xs">hapus<a>
	  </td>
	  
    </tr>
	<?php $i++; ?>
	<?php endforeach; ?>
  </tbody>
</table>
 
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
