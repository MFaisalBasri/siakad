<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="datatables/css/jquery.dataTables.css">
    <style>
        label {
            font-family: Montserrat;
            font-size: 18px;
            display: block;
            color: #262626;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        td a button {
            background: #3568b4;
            color: white;
            margin-top: 10px;
            width: 80px;
            height: 30px;
            border-radius: 5px;
        }

        .buttonAdminFull a button {
            background: #3568b4;
            color: white;
            margin-top: 10px;
            width: 80px;
            height: 30px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <h2>Data Mahasiswa</h2>
    <div class="table" style="overflow-x:auto;">
        <table id="example" class="display" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 0;
                $query = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY nim ASC");
                while ($row = mysqli_fetch_assoc($query)) {
                    $no++;
                ?>
                    <tr align="center">
                        <td><?php echo "$no" ?></td>
                        <td><?php echo $row['nim'] ?></td>
                        <td><?php echo $row['nama_mhs'] ?></td>
                        <td><?php echo $row['alamat_mhs'] ?></td>
                        <td><?php echo $row['tgl_lahir'] ?></td>
                        <td>
                            <a href="../siakad?page=edit-admin-id&nim=<?php echo $row['nim']; ?> ">
                                <button><i class="fa fa-pencil"></i>edit</button>
                            </a>

                            <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="system/models/mahasiswa/delete-mahasiswa.php?nim=<?php echo $row['nim'] ?>">
                                <button><i class="fa fa-trash-o"></i>hapus</button>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="buttonAdminFull">
        <a href="?page=tambah-data-mahasiswa">
            <button><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
        </a>
    </div>

    <script type="text/javascript" src="datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>