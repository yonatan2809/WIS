<?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:../index.php?pesan=belum_login");
	}
	?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Sekolah</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../proses/logout" role="button">
            <i class="fas fa-sign-out-alt"> Keluar </i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index" class="brand-link">
        <i class="fas fa-chalkboard-teacher">
          &nbsp; &nbsp;
          <span class="brand-text font-weight-light">SIS</span>
        </i>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


            <li class="nav-item">
              <a href="index" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-database"></i>
                <p>
                  Kelola Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="data_siswa" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola Data Siswa</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_guru" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola Data Guru</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_mapel" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola Data MaPel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="data_nilai" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelola Data Nilai Ujian</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Mata Pelajaran</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-3">
                    <a href="tambah_mapel" class="btn btn-block btn-lg btn-success float-left">Tambah Data MaPel</a>
                    <br>
                    <br>
                    <br>
                  </div>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Guru</th>
                        <th>Nama MaPel</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // Load file koneksi.php
                      include "../proses/koneksi.php";
                      // $query = "SELECT * FROM data_mapel ORDER BY id_guru DESC";

                      $query = "SELECT data_guru.id_guru,
                      data_guru.nama_guru, data_pelajaran.id_mapel, 
                      data_pelajaran.id_guru, data_pelajaran.mapel
                      FROM data_pelajaran
                      INNER JOIN data_guru ON data_pelajaran.id_guru = data_guru.id_guru
                      ORDER BY data_guru.nama_guru ASC"; // Query untuk menampilkan semua data dari inner join data penjual dengan data_mapel

                      // Query untuk menampilkan semua data data_mapel
                      $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                      while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                          echo "<td>" . $data['nama_guru'] . "</td>";
                          echo "<td>" . $data['mapel'] . "</td>";
                          echo "<td><center>
                          <a href='ubah_mapel?change=" . $data['id_mapel'] . "'>
                          <i class='fas fa-pencil-alt' title='Ubah'></i></a>
                          &nbsp;|&nbsp; 
                          <a href='../proses/delete_mapel?hapus=" . $data['id_mapel'] . "'>
                          <i class='fas fa-trash-alt' title='Hapus'></i></a></td>
                          </center></td>";
                          echo "</tr>";
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Nama Guru</th>
                        <th>Nama Guru</th>
                        <th>Aksi</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; Sistem Informasi Sekolah
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
                    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../plugins/jszip/jszip.min.js"></script>
  <script src="../plugins/pdfmake/pdfmake.min.js"></script>
  <script src="../plugins/pdfmake/vfs_fonts.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
</body>

</html>