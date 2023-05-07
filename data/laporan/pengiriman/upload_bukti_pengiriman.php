<?php

if (isset($_FILES['bukti_pengiriman'])) {

  // Tentukan direktori penyimpanan file
  $dir_upload = "img/foto/";

  // Tentukan nama file yang diupload
  $nama_file = $_FILES['bukti_pengiriman']['name'];

  // Pindahkan file ke direktori penyimpanan
  if (move_uploaded_file($_FILES['bukti_pengiriman']['tmp_name'], $dir_upload.$nama_file)) {

    // Jika file berhasil diupload, simpan nama file ke database
    $id_pengiriman = $_POST['id_pengiriman'];

    // Buat koneksi ke database
    $koneksi = mysqli_connect("localhost", "root", "", "qualita");

    // Query untuk menyimpan nama file ke database
    $query = "UPDATE tb_pengiriman SET bukti_pengiriman = '$nama_file' WHERE id_pengiriman = $id_pengiriman";

    // Jalankan query
    mysqli_query($koneksi, $query);

    // Tutup koneksi ke database
    mysqli_close($koneksi);

    // Redirect ke halaman yang sama
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;

  } else {

    // Jika file gagal diupload, tampilkan pesan error
    echo "Upload file gagal.";

  }

}

?>
