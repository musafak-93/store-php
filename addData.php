<?php
include 'connect.php';

$error_message = "";

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];
    $id_saldo = $_POST['id_saldo'];

    if (empty($tanggal) || empty($keterangan) || empty($jumlah) || empty($jenis) || empty($id_saldo)) {
        $error_message = "Data Tidak Boleh Kosong";
    } else {
        $sql = "INSERT INTO transaksi (tanggal,keterangan,jumlah,jenis,id_saldo)
        VALUES('$tanggal', '$keterangan', '$jumlah','$jenis','$id_saldo')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "data insert success";
            header('location:dataTransaksi.php');
        } else {
            die(mysqli_error($conn));
        }
    }
}

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
        <h1 class="text-center mt-2">Tambah Data Transaksi</h1>
        <form method="post" class="my-3">
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan">
            </div>
            <div class="mb-3">
                <label class="form-label">jumlah</label>
                <input type="number" class="form-control" name="jumlah">
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select class="form-select" name="jenis">
                    <option selected>Select</option>
                    <option value="kredit">Kredit</option>
                    <option value="debit">Debit</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Akun</label>
                <select class="form-select" name="id_saldo">
                    <option selected>Select</option>
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM saldo") or die(mysqli_error($conn));
                    while ($result = mysqli_fetch_array($sql)) {
                        echo "<option value='$result[id_saldo]'> $result[akun]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="error-message mb-2 text-danger"><?php echo $error_message; ?></div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-warning"><a href="dataTransaksi.php" class="text-light">Back</a></button>
        </form>
    </div>
</body>

</html>