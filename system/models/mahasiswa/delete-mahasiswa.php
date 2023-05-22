<?php
require_once("../../config/koneksi.php");

$id = $_GET['nim'];
$query = "DELETE FROM mahasiswa WHERE nim = '$id'";
$queryact = mysqli_query($conn, $query);
echo "<meta http-equiv='refresh'
                content='0; url=http://localhost:8080/project-web/siakad/?page=data-mahasiswa'>";
