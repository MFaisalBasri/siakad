<?php
require_once("system/config/koneksi.php");

if (isset($_POST['simpan'])) {
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $tglLahir = $_POST['tglLahir'];

  mysqli_query($conn, "UPDATE mahasiswa SET nama_mhs = '$nama', alamat_mhs = '$alamat', tgl_lahir = '$tglLahir' WHERE nim='$nim';");

  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost:8080/project-web/siakad/?page=data-mahasiswa'>";
}

?>

<html>

<head>
  <title>Homepage</title>
  <!--link datatables-->
  <style>
    label {
      font-family: Montserrat;
      font-size: 18px;
      display: block;
      color: #262626;
    }

    input[type=text],
    input[type=password] {
      border-radius: 5px;
      width: 40%;
      height: 35px;
      background: #eee;
      padding: 0 10px;
      box-shadow: 1px 2px 2px 1px #ccc;
      color: #262626;
    }

    input[type=submit] {
      height: 35px;
      width: 200px;
      background: #3568b4;
      border-radius: 20px;
      color: #fff;
      margin-top: 20px;
      cursor: pointer;
    }

    input {
      font-family: Montserrat;
      font-size: 16px;
    }

    .form-group {
      padding: 5px 0;
    }

    @media screen and (max-width: 576px) {
      .form-group input {
        width: 85%;
      }
    }
  </style>
</head>

<body>
  <h2 style="font-size: 30px; color: #262626;">Edit Data Mahasiswa</h2>
  <?php if (isset($_GET['nim'])) {
    $nim = $_GET['nim']; ?>
    <?php
    $cek = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='" . $_GET['nim'] . "'");
    $row = mysqli_fetch_array($cek);
    ?>
    <div class="form-group">
      <form action="" method="post">
        <label class="text-left">Nomor Induk Mahasiswa</label>
        <input type="text" name="id" disabled="disabled" value="<?php echo $_GET['nim']; ?>" />
    </div>

    <div class="form-group">
      <label class="">Nama Mahasiswa</label>
      <input type="text" name="nama" value="<?php echo $row['nama_mhs'] ?> " />
    </div>
    <div class="form-group">
      <label class="">Alamat</label>
      <input type="text" name="alamat" value="<?php echo $row['alamat_mhs'] ?>" required />
    </div>
    <div class="form-group">
      <label class="">Tanggal Lahir</label>
      <input type="text" name="tglLahir" value="<?php echo $row['tgl_lahir'] ?>" required />
    </div>
    <input name="nim" type="hidden" value="<?php echo $_GET['nim']; ?>" />
    <input class="button" onclick="alert('Berhasil Mengubah data admin!')" type="submit" name="simpan" value="Simpan Data" />


    </form>
  <?php } else {
    echo "Data tidak ada!!!"
  ?>

  <?php } ?>

</body>

</html>