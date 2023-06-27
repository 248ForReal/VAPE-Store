<?php
include("../function/function.php");
$id = $_GET['p_id'];
session_start();

if(isset($_SESSION['nama'])){
    $nama = $_SESSION['nama'];
} else {
    $nama = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="shortcut icon" href="../image/logo/vapetime.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/product-detail.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <head>
  <meta chat set="utf-8">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
</head>
<body>
<div class="content">
  <div class="shop-bg"></div>
  <div class="pop-up clearfix">
    <?php
    product_detail($id,$nama);
    ?>
    </div>
  </div>
    
</body>
</html>
