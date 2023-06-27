<?php
include_once("../lib/connect.php");
include("../function/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Input</title>
    <link rel="stylesheet" href="../style/card-product-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="inputan">
<form action="" method="post" enctype="multipart/form-data">
  <label for="name">Product Name:</label>
  <input type="text" id="name" name="nama" required><br>

  <label for="name">Product Brand:</label>
  <input type="text" id="name" name="brand" required><br>
  
  <label for="category">Category:</label>
  <?php
    kategori();
  ?>
  <br>

  <label for="name">Product Ket:</label>
  <input type="text" id="name" name="ket" required><br>
  
  <label for="stock">Stock:</label>
  <input type="number" id="stock" name="stock" min="0" required><br>
  
  <label for="price">Price:</label>
  <input type="number" id="price" name="price" min="0" step="0.01" required><br>
  
  <label for="image">Image:</label>
  <input type="file" id="image" name="image" accept="image/*" required><br>
  
  <label for="name">Deskripsi:</label>
  <input type="text" id="name" name="deskripsi" required><br>

  <button type="submit" name="simpan">Add Product</button>
</form>
</div>
<?php
    if(isset($_POST['simpan'])){
        $nama = $_POST['nama'];
        $brand = $_POST['brand'];
        $kategori = $_POST['kategori'];
        $ket = $_POST['ket'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];
        $image = $_FILES['image']['name'];
        $deskripsi = $_POST['deskripsi']; 
        $get = "SELECT * FROM produk ORDER BY p_id DESC LIMIT 1 ";
        $result = mysqli_query($connection, $get);
        if(mysqli_num_rows($result)){
          if($row = mysqli_fetch_assoc($result)){
            $id_produk = $row['p_id'];
            $get_number = str_replace("P","",$id_produk);
            $id_increase = $get_number+1;
            $get_string = str_pad($id_increase, 5,0, STR_PAD_LEFT);
            $id_baru = "P".$get_string;
            insert_product($id_baru,$nama,$brand,$kategori,$ket,$stock,$price,$image,$deskripsi);
            insert_brand($brand); 
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='product_input.php';</script>";       
          }
        }else{
            $id_baru = "P00001";
            insert_product($id_baru,$nama,$brand,$kategori,$ket,$stock,$price,$image,$deskripsi);
            insert_brand($brand);   
            echo "<script>alert('Data berhasil ditambahkan!');document.location.href='product_input.php';</script>";     
      }
    }

      footer();
?>


</body>
</html>

