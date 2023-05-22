<?php

require_once("system/config/koneksi.php");

if (isset($_POST['simpan'])) {
   $nim = $_POST['nim'];
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $tglLahir = $_POST['tgl_lahir'];

   mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nim','$nama','$alamat','$tglLahir')");

   echo "<script>
                alert('Selamat berhasil input data!');
              </script>";

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

      select {
         border-radius: 5px;
         width: 42%;
         height: 39px;
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

      input,
      select {
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

   <script type="text/javascript">
      function cek_data() {
         var x = daftar_user.nama.value;
         var x1 = parseInt(x);

         if (x == "") {
            alert("Maaf harap input nama admin!");
            daftar_user.nama.focus();
            return false;
         }
         if (isNaN(x1) == false) {
            alert("Maaf nama harus di input huruf!");
            daftar_user.nama.focus();
            return false;
         }
         var x = daftar_user.telepon.value;
         var angka = /^[0-9]+$/;

         if (x == "") {
            alert("Maaf harap input nomor telepon!");
            daftar_user.telepon.focus();
            return false;
         }
         if (!x.match(angka)) {
            alert("Maaf nomor telepon harus di input angka!");
            daftar_user.telepon.focus();
            return false;
         }
         if (x.length != 12) {
            alert("Nomor telepon harus 12 karakter!");
            daftar_user.telepon.focus();
            return false;
         }
         var x = daftar_user.email.value;
         var cek_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

         if (x == "") {
            alert("Maaf harap input email!");
            daftar_user.email.focus();
            return false;
         }
         if (!x.match(cek_email)) {
            alert("Format penulisan email tidak sesuai!");
            daftar_user.email.focus();
            return false;
         }
         var x = daftar_user.password.value;
         var panjang = x.length;

         if (x == "") {
            alert("Maaf harap input password!");
            daftar_user.password.focus();
            return false;
         }
         if (panjang < 6 || panjang > 20) {
            alert("Password di input minimum 6 karakter dan maksimum 20 karakter!");
            daftar_user.password.focus();
            return false;
         }
         var p = daftar_user.level.value;
         if (p == "p") {
            alert("Maaf harap input level admin!");
            return (false);
         } else {
            confirm("Apakah Anda yakin sudah input data dengan benar?");
         }
         return true;
      }
   </script>

</head>

<body>
   <h2 style="font-size: 30px; color: #262626;">Tambah Data Mahasiswa</h2>


   <form id="daftar_user" action="" method="post" onsubmit="return cek_data()">
      <div class="form-group">
         <label class="text-left">Nomor Induk Mahasiswa</label>
         <input type="text" name="nim" placeholder="Masukan Nim" />
      </div>

      <div class="form-group">
         <label class="left">Nama</label>
         <input type="text" name="nama" placeholder="Masukan Nama Mahasiswa" />
      </div>

      <div class="form-group">
         <label class="">Alamat</label>
         <input type="text" placeholder="Masukan Alamat" name="alamat" />
      </div>

      <div class="form-group">
         <label class="">Tanggal Lahir</label>
         <input type="text" placeholder="Masukan Tanggal Lahir" name="tgl_lahir" />
      </div>

      <input type="submit" name="simpan" value="Simpan"></input>
   </form>



</body>

</html>