<?php
include "../function/function.php";
include "../lib/connect.php";

$id = $_GET['id_invoice'];
$op = $_GET['op'];
$pesanan = mysqli_query($connection, "SELECT * FROM histori WHERE id_invoice = '$id'");

$stokUpdated = true; // Variabel untuk menentukan status pembaruan stok barang

while ($row = mysqli_fetch_array($pesanan)) {
    $barang_pesanan = explode(',', $row['barang_pesanan']);

    foreach ($barang_pesanan as $barang) {
        $detail_pesanan = explode('-', $barang);

        // Memastikan jumlah elemen array yang valid
        if (count($detail_pesanan) >= 3) {
            $nama_barang = trim($detail_pesanan[0]);
            $jumlah_barang = $detail_pesanan[2];

            ?>

            <tr>
                <td><?php echo $nama_barang; ?></td>
                <td><?php echo  $jumlah_barang; ?></td>
                <!-- Kolom lainnya -->
            </tr>

            <?php

            $sqlStok = "SELECT stok FROM produk WHERE nama = '$nama_barang'";
            $resultStok = $connection->query($sqlStok);

            if ($resultStok->num_rows > 0) {
                $rowStok = $resultStok->fetch_assoc();
                $stokBarang = $rowStok["stok"];

                // Menambah stok barang
                $stokBarang += $jumlah_barang;
                $sqlUpdateStok = "UPDATE produk SET stok = $stokBarang WHERE nama = '$nama_barang'";

                if ($connection->query($sqlUpdateStok) !== TRUE) {
                    $stokUpdated = false;
                    echo "<p>Gagal memperbarui stok barang: " . $connection->error . "</p>";
                    break; // Keluar dari loop jika ada kesalahan pada pembaruan stok
                }
            } else {
                $stokUpdated = false; // Barang tidak ditemukan dalam database
                echo "<p>Gagal memperbarui stok barang: Barang tidak ditemukan.</p>";
                break; // Keluar dari loop jika barang tidak ditemukan
            }
        } else {
            echo "Format pesanan tidak valid: " . $barang . "<br>";
            $stokUpdated = false; // Format pesanan tidak valid
            break; // Keluar dari loop jika format pesanan tidak valid
        }
    }
}

if ($stokUpdated) {
    $invoiceID = $row['id_invoice'];
    header("location:approve.php?op=tolak&id_invoice=$id");
    exit;
} else {
    echo "<p>Gagal memperbarui stok barang.</p>";
}
?>

