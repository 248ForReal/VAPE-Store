<?php
include("../function/function.php");

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
    <title>Product</title>
    <link rel="shortcut icon" href="../image/logo/vapetime.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/card-product-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php
    if(!isset($_GET['search'])){
        $search = "";
    }
    else{
        $search = $_GET['search'];
    }   

    if($search){
        $query = "SELECT produk.p_id,nama,brand,kategori,ket,gambar, FORMAT(produk.harga,0,'de_DE') AS harga,stok,deskripsi FROM produk 
        WHERE produk.nama LIKE '%".$search."%' OR produk.kategori LIKE '%".$search."%' 
        ORDER BY produk.p_id DESC";
    }
    else{
        $query = "SELECT produk.p_id,nama,brand,kategori,ket,gambar, FORMAT(produk.harga,0,'de_DE') AS harga,stok,deskripsi FROM produk 
        order by nama asc";
    }
    kepala1($nama);
    nav();
    ?>   
    <div class="produk">
    <?php
    card($query);
    ?>
    </div>
    <footer>
    <?php
    footer();
    ?>  
    </footer>
    
</body>

</html>