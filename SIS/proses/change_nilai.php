<?php
// Load file koneksi.php

include "koneksi.php";

$id_nilai = $_GET['change'];
// Ambil data id_barang yang dikirim oleh dashboardadmin.php melalui URL
                                
// Ambil Data yang Dikirim dari Form
$id_siswa =  $_POST['id_siswa'];
$id_mapel =  $_POST['id_mapel'];
$nilai    =  $_POST['nilai'];
$ujian    =  $_POST['ujian'];

// Proses simpan ke Database
  $query = "UPDATE data_nilai SET id_siswa='".$id_siswa."', id_mapel='".$id_mapel."', nilai='".$nilai."', ujian='".$ujian."'
            WHERE id_nilai='".$id_nilai."' ";

  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil diubah');
         window.location.href='../page/data_nilai';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_nilai';
         </script>";
  }
?>