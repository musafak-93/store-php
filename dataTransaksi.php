<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-2">Data Transaksi</h1>
        <button class="btn btn-primary my-3"><a href="addData.php" class="text-light">Tambah Data</a></button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NO</th>
                    <th scope="col">TANGGAL</th>
                    <th scope="col">KETERANGAN</th>
                    <th scope="col">JUMLAH</th>
                    <th scope="col">JENIS</th>
                    <th scope="col">AKUN</th>
                    <th scope="col">SISA SALDO</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // $sql = "SELECT * FROM employee";
                $sql = "SELECT * FROM transaksi LEFT JOIN saldo ON transaksi.id_saldo = saldo.id_saldo";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id_transaksi = $row['id_transaksi'];
                        $tanggal = $row['tanggal'];
                        $keterangan = $row['keterangan'];
                        $jumlah = $row['jumlah'];
                        $jenis = $row['jenis'];
                        $akun = $row['akun'];
                        $saldo = $row['saldo'];
                        echo
                        '<tr>
                        <th scope="row">' . $no . '</th>
                        <td>' . $tanggal . '</td>
                        <td>' . $keterangan . '</td>
                        <td>' . $jumlah . '</td>
                        <td>' . $jenis . '</td>
                        <td>' . $akun . '</td>
                        <td>' . $saldo . '</td>
                        <td>
                        <button class="btn btn-primary"><a href="updateData.php?updateid=' . $id_transaksi . '" class="text-light">Edit</a></button>
                        <button class="btn btn-danger"><a href="deleteData.php?deleteid=' . $id_transaksi . '" class="text-light">Delete</a></button>
                        </td>
                    </tr>';
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>