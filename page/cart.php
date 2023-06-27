<?php
include("../function/function.php");
session_start();
$nama = $_SESSION['nama'];
$alamat = $_SESSION['alamat'];
$user = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
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
          <?php
          keranjang($nama,$user);
          if(isset($_GET['op'])){
              $id = $_GET['p_id'];
              $pemesan = $_GET['pemesan'];
              $op = $_GET['op'];
          }else{
              $op = '';
          }
          if($op == 'hapus'){
              $sql = $connection->query("DELETE FROM keranjang WHERE id_keranjang = '$id' AND pemesan = '$pemesan' ");
              echo "<script>alert('Barang Berhasil dihapus');document.location.href='../page/cart.php';</script>";	
          }
          ?>

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