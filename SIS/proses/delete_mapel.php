<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data id_produk yang dikirim oleh produk_jual.php melalui URL
$id_mapel = $_GET['hapus'];

// Query untuk menghapus data siswa berdasarkan id_produk yang dikirim
$query = "DELETE FROM data_pelajaran WHERE id_mapel='".$id_mapel."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ../page/data_mapel"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='../page/data_mapel'>Kembali</a>";
}
?>