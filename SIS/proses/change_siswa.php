<?php
// Load file koneksi.php

include "koneksi.php";
$id_siswa = $_GET['change'];
// Ambil data id_barang yang dikirim oleh dashboardadmin.php melalui URL
                                
// Ambil Data yang Dikirim dari Form
$nama_siswa     =  $_POST['nama_siswa'];
$kelas          =  $_POST['kelas'];
$tahun_angkatan =  $_POST['tahun_angkatan'];

// Proses simpan ke Database
  $query = "UPDATE data_siswa SET nama_siswa='".$nama_siswa."', kelas='".$kelas."', tahun_angkatan='".$tahun_angkatan."'
            WHERE id_siswa='".$id_siswa."' ";

  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil diubah');
         window.location.href='../page/data_siswa';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_siswa';
         </script>";
  }
?>