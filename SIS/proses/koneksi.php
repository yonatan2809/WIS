<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_sekolah");
 
// Check connection
if (mysqli_connect_error()){
	echo "Gagal Terhubung Ke Database : " .mysqli_connect_error();
}
