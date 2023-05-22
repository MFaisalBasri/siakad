<?php
include_once("system/config/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <link rel="shortcut icon" href="asset/internal/img/img-local/favicon.ico">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="asset/internal/css/styleDashboard.css" />
</head>

<body>

  <div class="sidebar active">
    <div class="logo_content">
      <div class="logo">
        <img src="asset/internal/img/img-local/logo.png" alt="" />
        <span><b>SIAKAD</b></span>
      </div>
      <i class="fa fa-bars" id="btn"></i>
    </div>

    <ul class="nav">
      <li>
        <a href="?page=data-mahasiswa">
          <i class="fa fa-users"></i>
          <span class="link_name">Data Mahasiswa</span>
        </a>
        <span class="tooltip">Data Mahasiswa</span>
      </li>
      <li>
        <a href="dashboard.php?page=data-mataKuliah">
          <i class="fa fa-users"></i>
          <span class="link_name">Data Matkul</span>
        </a>
        <span class="tooltip">Data Matkul</span>
      </li>
      <li>
        <a href="dashboard.php?page=data-sampah">
          <i class="fa fa-user"></i>
          <span class="link_name">Data Dosen</span>
        </a>
        <span class="tooltip">Data Dosen</span>
      </li>
      <li>
        <a href="?page=data-report">
          <i class="fa fa-line-chart"></i>
          <span class="link_name">Grafik Monitoring</span>
        </a>
        <span class="tooltip">Grafik Monitoring</span>
      </li>
      <li>
        <a href="../system/models/login/logout.php">
          <i class="fa fa-sign-out"></i>
          <span class="link_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
      </li>
    </ul>
  </div>

  <div class="home_content">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];

      switch ($page) {
        case 'data-mahasiswa':
          include "system/models/mahasiswa/view-mahasiswa-full.php";
          break;
        case 'tambah-data-mahasiswa':
          include "system/models/mahasiswa/tambah-mahasiswa.php";
          break;
        case 'edit-admin-id':
          include "system/models/mahasiswa/edit-mahasiswa-id.php";
          break;
        case 'data-report':
          include "system/models/report/view-report.php";
          break;
        default:
          echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
          break;
      }
    } else {
      include "system/models/mahasiswa/view-mahasiswa-full.php";
    }
    ?>
  </div>

  <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    let scrBtn = document.querySelector(".bx-search");
    let src = document.querySelector(".src");

    btn.onclick = function() {
      sidebar.classList.toggle("active");
    };
    scrBtn.onclick = function() {
      src.classList.toggle("active");
    };
    scrBtn.onclick = function() {
      sidebar.classList.toggle("active");
    };
  </script>
</body>

</html>