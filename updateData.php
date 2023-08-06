<?php
include 'connect.php';

$id_transaksi = $_GET['updateid'];

$sql = "SELECT * FROM transaksi where id_transaksi=$id_transaksi";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$tanggal = $row['tanggal'];
$keterangan = $row['keterangan'];
$jumlah = $row['jumlah'];
$jenis = $row['jenis'];
$id_saldo = $row['id_saldo'];

if (isset($_POST['submit'])) {
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $jumlah = $_POST['jumlah'];
    $jenis = $_POST['jenis'];
    $id_saldo = $_POST['id_saldo'];

    $sql = "UPDATE transaksi set id_transaksi='$id_transaksi',tanggal='$tanggal',keterangan='$keterangan',jumlah='$jumlah',jenis='$jenis',id_saldo='$id_saldo' where id_transaksi=$id_transaksi";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "data insert success";
        header('location:dataTransaksi.php');
    } else {
        die(mysqli_error($conn));
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
        <h1 class="text-center mt-2">Edit Data Transaksi</h1>
        <form method="post" class="my-3">
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value=<?php echo $tanggal; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value=<?php echo $keterangan; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">jumlah</label>
                <input type="number" class="form-control" name="jumlah" value=<?php echo $jumlah; ?>>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select class="form-select" name="jenis">
                    <option selected>Select</option>
                    <option value="kredit" <?php echo ($jenis == 'kredit') ? 'selected' : ''; ?>>Kredit</option>
                    <option value="debit" <?php echo ($jenis == 'debit') ? 'selected' : ''; ?>>Debit</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Akun</label>
                <select class="form-select" name="id_saldo">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM saldo") or die(mysqli_error($conn));
                    while ($result = mysqli_fetch_array($sql)) {
                        $selected = ($result['id_saldo'] == $id_saldo) ? 'selected' : '';
                        echo "<option value='$result[id_saldo]' $selected> $result[akun]</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <button class="btn btn-warning"><a href="dataTransaksi.php" class="text-light">Back</a></button>
        </form>
    </div>
</body>

</html>