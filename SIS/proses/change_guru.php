<?php
// Load file koneksi.php

include "koneksi.php";
$id_guru = $_GET['change'];
// Ambil data id_barang yang dikirim oleh dashboardadmin.php melalui URL
                                
// Ambil Data yang Dikirim dari Form
$nama_guru     =  $_POST['nama_guru'];

// Proses simpan ke Database
  $query = "UPDATE data_guru SET nama_guru='".$nama_guru."'
            WHERE id_guru='".$id_guru."' ";

  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil diubah');
         window.location.href='../page/data_guru';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_guru';
         </script>";
  }
?>