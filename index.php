<?php
include "koneksi.php";

// TAMBAH TRANSAKSI
if (isset($_POST['tambah'])) {

    $tanggal = $_POST['tanggal'];
    $jenis = $_POST['jenis'];
    $deskripsi = $_POST['deskripsi'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];

    mysqli_query($koneksi, "INSERT INTO transaksi
        (tanggal, jenis, deskripsi, kategori, jumlah)
        VALUES
        ('$tanggal', '$jenis', '$deskripsi', '$kategori', '$jumlah')");

    header("Location: index.php");
    exit;
}

// MENAMPILKAN RIWAYAT TRANSAKSI
$data = mysqli_query($koneksi, "SELECT * FROM transaksi ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Tracker</title>
</head>

<body>

<h1>Financial Tracker</h1>

<h2>Tambah Transaksi</h2>

<form method="POST">

    Tanggal:
    <input type="date" name="tanggal" required>
    <br><br>

    Jenis:
    <input type="radio" name="jenis" value="Pemasukan" required>
    Pemasukan

    <input type="radio" name="jenis" value="Pengeluaran">
    Pengeluaran

    <br><br>

    Deskripsi:
    <input type="text" name="deskripsi" required>
    <br><br>

    Kategori:
    <input type="radio" name="kategori" value="Makanan" required>
    Makanan

    <input type="radio" name="kategori" value="Transportasi">
    Transportasi

    <input type="radio" name="kategori" value="Tagihan">
    Tagihan

    <input type="radio" name="kategori" value="Pendidikan">
    Pendidikan

    <input type="radio" name="kategori" value="Hiburan">
    Hiburan

    <input type="radio" name="kategori" value="Lainnya">
    Lainnya

    <br><br>

    Jumlah:
    <input type="number" name="jumlah" required>

    <br><br>

    <button type="submit" name="tambah">Tambah</button>

</form>


<h2>Riwayat Transaksi</h2>

<table border="1" cellpadding="8" cellspacing="0">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jenis</th>
        <th>Deskripsi</th>
        <th>Kategori</th>
        <th>Jumlah</th>
    </tr>

    <?php
    $no = 1;

    while ($row = mysqli_fetch_assoc($data)) {
    ?>

    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['jenis']; ?></td>
        <td><?= $row['deskripsi']; ?></td>
        <td><?= $row['kategori']; ?></td>
        <td>Rp <?= number_format($row['jumlah'], 0, ',', '.'); ?></td>
    </tr>

    <?php } ?>

</table>

</body>
</html>