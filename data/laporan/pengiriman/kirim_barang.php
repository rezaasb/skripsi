<?php
  // Skrip untuk melakukan reporting error
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>

<?php
require 'functions.php';

// Ambil id_pengiriman dari URL
$id_pengiriman = $_GET["id"];

// Cek apakah tombol kirim sudah ditekan atau belum
if(isset($_POST["kirim"])) {
  // Ambil nilai input status_pengiriman dari form
  $status_pengiriman = $_POST["status_pengiriman"];

  // Query untuk update status_pengiriman pada tabel tb_pengiriman
  $query = "UPDATE tb_pengiriman SET status = $status_pengiriman WHERE id_pengiriman = $id_pengiriman";
  mysqli_query($conn, $query);

  // Redirect kembali ke halaman kirim_barang.php
  header("Location: kirim_barang.php");
  exit;
}

// Query untuk mengambil data pengiriman berdasarkan id_pengiriman
$pengiriman = query("SELECT * FROM tb_pengiriman
					INNER JOIN tb_barang ON tb_barang.id_barang = tb_pengiriman.id_barang 
					INNER JOIN tb_nabar ON tb_pengiriman.id_nabar = tb_nabar.id_nabar 
					INNER JOIN costumer ON costumer.id_costumer = tb_pengiriman.id_costumer
					WHERE id_pengiriman = $id_pengiriman");					
?>

<div class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <div class="text-center">
            <h1>Kirim Barang</h1>
            <hr>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php foreach ($pengiriman as $row): ?>
            <form action="" method="POST">
              <div class="form-group">
                <label for="status_pengiriman">Status Pengiriman</label>
                <select name="status_pengiriman" class="form-control">
                  <option value="1" <?php if ($row["status"] == 1) { echo "selected"; } ?>>Sedang Dikirim</option>
                  <option value="2" <?php if ($row["status"] == 2) { echo "selected"; } ?>>Sudah Diterima</option>
                </select>
              </div>
              <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
              <a href="kirim_barang.php" class="btn btn-default">Batal</a>
            </form>
          <?php endforeach; ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
<!-- /.content -->
