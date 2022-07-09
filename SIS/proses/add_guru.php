<?php
// Load file koneksi.php

include "koneksi.php";

// Ambil Data yang Dikirim dari Form tambah_siswa.php
$nama_guru     =   $_POST['nama_guru'];

  // Proses simpan ke Database
  $query    = "INSERT INTO data_guru VALUES(NULL, '".$nama_guru."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil disimpan');
         window.location.href='../page/data_guru';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_guru';
         </script>";
  }
