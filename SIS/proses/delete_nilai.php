<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data id_produk yang dikirim oleh produk_jual.php melalui URL
$id_nilai = $_GET['hapus'];

// Query untuk menghapus data siswa berdasarkan id_produk yang dikirim
$query = "DELETE FROM data_nilai WHERE id_nilai='".$id_nilai."'";
$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
  // Jika Sukses, Lakukan :
  header("location: ../page/data_nilai"); // Redirect ke halaman index.php
}else{
  // Jika Gagal, Lakukan :
  echo "Data gagal dihapus. <a href='../page/dat_nilai'>Kembali</a>";
}
?>