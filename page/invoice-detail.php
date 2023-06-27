<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice Detail</title>
  <link rel="shortcut icon" href="../image/logo/vapetime.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/cobacart.css">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
<section class="h-100 h-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="invoice.php" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Kembali</a></h5>
                <hr>
                
                <?php
                include('../lib/connect.php');
                $id_i = $_GET['id_invoice'];
                $id_p = $_GET['id_pemesan'];
                $sql = "SELECT * FROM histori where id_invoice = '$id_i' AND id_pemesan = '$id_p'";
                $hasil = mysqli_query($connection,$sql);
                while($row = mysqli_fetch_array($hasil)){
                  $id = $row['id_invoice'];
                  $total = $row['total_harga'];
                  $pesanan = explode(', ',$row['barang_pesanan']);
                  ?>
                  <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <p class="mb-2">ID INVOICE : <?=$id?></p>
                            <?php
                              if($row['acc'] == 'Dikonfirmasi'){
                                ?>
                              <a href="" style="color: white;" class="btn btn-success" ><i class="far fa-circle-check"></i> Terkonfirmasi</a>
                                <?php
                              }else
                              if($row['acc'] == 'Menunggu'){
                                ?>
                              <a href="" style="color: white;" class="btn btn-warning"><i class="fas fa-question"></i> Menunggu</a>
                                <?php
                              }else
                              if($row['acc'] == 'DiBatalkan'){
                                ?>
                              <a href="" style="color: white;" class="btn btn-danger"><i class="fas fa-skull-crossbones"></i> Dibatalkan</a>
                                <?php
                              }else
                              if($row['acc'] == 'Ditolak'){
                                ?>
                              <a href="" style="color: white;" class="btn btn-danger"><i class="fas fa-skull-crossbones"></i> Ditolak</a>
                                <?php
                              }
                            ?>
                        </div>
                  </div>
                  
                  

                    <?php
                      foreach($pesanan as $p => $k){
                        ?>
                        <div class="card mb-3">
                        <div class="card-body">
                        <div class="d-flex justify-content-between">
                        <?php
                        $barang = explode('-',$k);
                        foreach($barang as $a){
                    ?>
                        <div class="d-flex flex-row align-items-center">
                        <div style="width: 150px;">
                          <h5 class="fw-normal mb-0"><?= $a?></h5>
                        </div>
                      </div>
                  <?php
                        }
                        ?>
                        </div>
                        </div>
                      </div>
                        <?php
                      }
                        ?>
                        
                        
                        
                    </div>
                        <div class="col-lg-5">

                        <div class="card bg-primary text-white rounded-3">
                          <div class="card-body">
                            <hr class="my-4">

                            <div class="d-flex justify-content-between">
                              <p class="mb-2">Subtotal</p>
                              <span>Rp.<?= number_format($total, 0, ',', '.') ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                              <p class="mb-2">Total(Incl. taxes)</p>
                              <span>Rp.<?= number_format($total, 0, ',', '.') ?></span>
                            </div>

                            <?php
                            if($row['acc'] == 'Menunggu'){
                              ?>
                              <form action="" method="post">
                                <button type="submit" name="batal" class="btn btn-danger btn-block btn-lg">
                                  <div class="d-flex justify-content-between">
                                  <span>Rp.<?= number_format($total, 0, ',', '.') ?></span>
                                    <span>Batal</span>
                                  </div>
                                </button>
                              </form>
                              <?php
                            }else if($row['acc'] == 'Dikonfirmasi'){
                              ?>
                              <button class="btn btn-success btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Rp.<?= number_format($total, 0, ',', '.') ?></span>
                                  <span><?=$row['acc'] ?></span>
                                </div>
                              </button>
                              <?php
                            }else{
                              ?>
                              <button class="btn btn-info btn-block btn-lg">
                                <div class="d-flex justify-content-between">
                                <span>Rp.<?= number_format($total, 0, ',', '.') ?></span>
                                  <span style="color: red;"><i class="fas fa-skull-crossbones"></i> <?=$row['acc'] ?></span>
                                </div>
                              </button>
                              <?php
                            }
                            ?>
                            
                          </div>
                        </div>

                        </div>
                        <?php
                        if(isset($_POST['batal'])){
                          $id = $_GET['id_invoice'];
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
                                echo "<script>alert('Berhasil Membatalkan Pesanan');document.location.href='invoice.php';</script>";
                                $status = mysqli_query($connection,"UPDATE histori SET acc = 'DiBatalkan' where id_invoice = '$id'");
                            } else {
                                echo "<p>Gagal memperbarui stok barang.</p>";
                            }
                        }
                      }
                  ?>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
></script>
</body>
</html>