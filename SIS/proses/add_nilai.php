<?php
// Load file koneksi.php

include "koneksi.php";

// Ambil Data yang Dikirim dari Form tambah_siswa.php
$id_siswa  =   $_POST['id_siswa'];
$id_mapel  =   $_POST['id_mapel'];
$nilai     =   $_POST['nilai'];
$ujian     =   $_POST['ujian'];


  // Proses simpan ke Database
  $query    = "INSERT INTO data_nilai VALUES(NULL, '".$id_siswa."', '".$id_mapel."', '".$nilai."', '".$ujian."')";
  $sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
    if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    echo "<script>
         alert('Berhasil, Data berhasil disimpan');
         window.location.href='../page/data_nilai';
         </script>";
  }else{
    // Jika Gagal, Lakukan :
    echo "<script>
         alert('MAAF, Terjadi kesalahan pada sistem.');
         window.location.href='../page/data_nilai';
         </script>";
  }
