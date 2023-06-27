<!DOCTYPE html>
<?php
include "../function/function.php";
include "../lib/connect.php";
include "company_info.php";
session_start();


?>
<html lang="en">

<?php
include "mockup/head.php";
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php
        include "mockup/sidebar.php";
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                include "mockup/navbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Approve</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40%">Invoice</th>
                                            <th width="15%">Id Pemesan</th>
                                            <th width="15%">Nama Penerima</th>
                                            <th width="15%">Alamat</th>
                                            <th width="10%">Barang pesanan</th>
                                            <th width="15%">Total Di Bayar</th>
                                            <th width="15%">Status</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <!-- <tfoot>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Foto</th>
                                            <th>Kategori</th>
                                            <th>Harga</th>
                                        </tr>
                                    </tfoot> -->
                                    <tbody>

                                        <?php
                                        $pesanan = mysqli_query($connection, "SELECT * FROM histori");
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($pesanan)) {
                                            $no++;

                                        ?>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td><?php echo $row['id_invoice'] ?></td>
                                                <td><?php echo $row['id_pemesan'] ?></td>
                                                <td><?php echo $row['nama_penerima'] ?></td>
                                                <td><?php echo $row['alamat_penerima'] ?></td>
                                                <td><?php echo $row['barang_pesanan'] ?></td>
                                                <td><?php echo $row['total_harga'] ?></td>
                                                <td><?php echo $row['acc'] ?></td>
                                                <td align="center">
                                                    <?php
                                                        if($row['acc'] == 'Menunggu'){
                                                            ?>
                                                               <a href="?op=terima&id_invoice=<?= $row['id_invoice'] ?>" class="btn btn-success w-100 mb-2">Terima</a>
                                                                <a href="approve2.php?op=tolak&id_invoice=<?= $row['id_invoice'] ?>"><button name="btntolak" class="btn btn-danger w-100 mb-2" data-toggle="modal">Tolak</button></a>
                                                            <?php
                                                        }else if($row['acc'] == 'Dikonfirmasi'){
                                                            ?>
                                                            <a href="?op=batal&id_invoice=<?= $row['id_invoice'] ?>"><button name="btnbatal" class="btn btn-danger w-100 mb-2" data-toggle="modal">Batal</button></a>
                                                            <?php
                                                        }
                                                if (isset($_GET['op'])) {
                                                    $op = $_GET['op'];
                                                    $id = $_GET['id_invoice'];
                                                } else {
                                                    $op = '';
                                                }

                                                if ($op == 'terima') {
                                                    $status =  mysqli_query($connection, "UPDATE histori SET acc = 'Dikonfirmasi' where id_invoice = '$id'");
                                                    echo '<script> location.replace("approve.php"); </script>';
                                                }
                                                if ($op == 'tolak') {
                                                    $status =  mysqli_query($connection, "UPDATE histori SET acc = 'Ditolak' where id_invoice = '$id'");
                                                    echo '<script> location.replace("approve.php"); </script>';
                                                }
                                                if ($op == 'batal') {
                                                    $status =  mysqli_query($connection, "UPDATE histori SET acc = 'DiBatalkan' where id_invoice = '$id'");
                                                    echo '<script> location.replace("approve.php"); </script>';
                                                }
                                            }
                                                ?>