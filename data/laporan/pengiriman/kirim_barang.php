<?php
  // Skrip untuk melakukan reporting error
  error_reporting(E_ALL);
  ini_set('display_errors', '1');

  $conn = mysqli_connect("localhost","root","","qualita");


// Ambil id_pengiriman dari URL
$id_pengiriman = $_GET["id"];

// Cek apakah tombol kirim sudah ditekan atau belum
if(isset($_GET["id"])) {

  // Ambil nilai input status_pengiriman dari form
  $status_pengiriman = '2';
  
  // Query untuk update status_pengiriman pada tabel tb_pengiriman
  $query = "UPDATE tb_pengiriman SET status = '$status_pengiriman' WHERE id_pengiriman = '$id_pengiriman'";
  mysqli_query($conn, $query);
  
  // Redirect kembali ke halaman kirim_barang.php
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
}
