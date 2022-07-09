<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data id_produk yang dikirim oleh produk_jual.php melalui URL
$id_guru = $_GET['hapus'];

// Query untuk menghapus data siswa berdasarkan id_produk yang dikirim
$query = "DELETE FROM data_guru WHERE id_guru='".$id_guru."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ../page/data_guru"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='../page/data_guru'>Kembali</a>";
}
?>