<?php
// Load file koneksi.php

include "koneksi.php";

// Ambil Data yang Dikirim dari Form tambah_siswa.php
$nama_siswa     =   $_POST['nama_siswa'];
$kelas          =   $_POST['kelas'];
$tahun_angkatan =   $_POST['tahun_angkatan'];

  // Proses simpan ke Database
  $query    = "INSERT INTO data_siswa VALUES(NULL, '".$nama_siswa."', '".$kelas."', '".$tahun_angkatan."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil disimpan');
         window.location.href='../page/data_siswa';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_siswa';
         </script>";
  }
