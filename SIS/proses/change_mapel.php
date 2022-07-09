<?php
// Load file koneksi.php

include "koneksi.php";
$id_mapel = $_GET['change'];
// Ambil data id_barang yang dikirim oleh dashboardadmin.php melalui URL
                                
// Ambil Data yang Dikirim dari Form
$id_guru  =  $_POST['id_guru'];
$mapel    =  $_POST['mapel'];

// Proses simpan ke Database
  $query = "UPDATE data_pelajaran SET id_guru='".$id_guru."', mapel='".$mapel."'
            WHERE id_mapel='".$id_mapel."' ";

  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil diubah');
         window.location.href='../page/data_mapel';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_mapel';
         </script>";
  }
?>