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
                            <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
                        </div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
                        Tambah Produk
                        </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40%">Nama Produk</th>
                                            <th width="15%">Brand</th>
                                            <th width="15%">Kategori</th>
                                            <th width="15%">Keterangan</th>
                                            <th width="10%">Foto</th>
                                            <th width="15%">Harga</th>
                                            <th width="15%">Stok</th>
                                            <th width="15%">Deskripsi</th>
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
                                    $produk = mysqli_query($connection, "SELECT produk.p_id,produk.nama,produk.brand,produk.kategori,produk.ket, FORMAT(produk.harga,0,'de_DE') AS harga, produk.harga AS harga2, produk.gambar,produk.stok,produk.deskripsi FROM produk");
                                        $no = 0;
                                          while ($row = mysqli_fetch_array($produk)){
                                                $no++;
                                                    $images = $row['gambar'];
                                                    $id = $row['p_id'];
                                                

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no;?></td>
                                            <td><?php echo $row['nama']?></td>
                                            <td><?php echo $row['brand']?></td>
                                            <td align="center"><?php echo $row['kategori']?></td>
                                            <td><?php echo $row['ket']?></td>
                                            <td><img src="../image/FotoProduk/<?php echo $images;?>" class="w-100"></td>
                                            <td align="center">Rp <?php echo $row['harga']?></td>
                                            <td><?php echo $row['stok']?></td>
                                            <td><?php echo $row['deskripsi']?></td>
                                            <td align="center">
                                            <button class="btn btn-warning w-100 mb-2" data-toggle="modal" data-target="#editData<?php echo $row['p_id']?>">Edit</button>

<!-- Modal Edit -->
<form method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editData<?php echo $row['p_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
                    <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Produk</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                            <input type="text" name="nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk" value="<?php echo $row['nama']?>">
                                            </div>
                                            <div style="font-weight: bold;">Brand</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                                <input type="text" name="brand" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk" value="<?php echo $row['brand']?>">
                                            </div>
                                            <div style="font-weight: bold;">Kategori</div>
                                            <div class="input-group flex-nowrap m-3">
                                             <?php
                                                    kategori();
                                            ?>
                                            </div>
                                            <div style="font-weight: bold;">Keterangan</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                             <input type="text" name="ket" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Keterangan Produk" value="<?php echo $row['ket']?>">
                                             </div>
                                            <div style="font-weight: bold;">Foto Produk</div>
                                            <div class="mb-3 w-50">
                                                <input type="file" name="gambar" class="form-control">
                                            </div>
                                            <div style="font-weight: bold;">Harga</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                                <input type="number" name="harga" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Harga Produk" value="<?php echo $row['harga']?>">
                                            </div>
                                            <div style="font-weight: bold;">stock</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                                <input type="number" name="stock" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Stock Produk" value="<?php echo $row['stok']?>">
                                            </div>
                                            <div style="font-weight: bold;">deskripsi</div>
                                            <div class="input-group flex-nowrap mb-3 w-50">
                                                <input type="text" name="deskripsi" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Deskripsi  Produk" value="<?php echo $row['deskripsi']?>">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnEdit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
                </div>
            </div>
            </div>
            <?php
if(isset($_POST["btnEdit"])){
    $id = $_POST['p_id'];
    $nama = $_POST['nama'];
    $brand = $_POST['brand'];
    $kategori = $_POST['kategori'];
    $ket = $_POST['ket'];
    $stock = $_POST['stock'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi']; 

    $dir = "../image/FotoProduk/";
    $foto = $_FILES["gambar"]["name"];
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $dir . $foto);

    if($nama != NULL && $harga != NULL){
        if($foto == NULL){
            $edit_data = mysqli_query($connection,"UPDATE produk SET nama = '$nama', brand = '$brand', kategori = '$kategori', harga = '$harga', stok = '$stock', deskripsi = '$deskripsi' WHERE p_id = '$id'");
            echo '<script> location.replace("produk.php"); </script>';
        }
        else{
            $edit_data = mysqli_query($connection,"UPDATE produk SET nama = '$nama', brand = '$brand', kategori = '$kategori', harga = '$harga', gambar = '$foto', stok = '$stock', deskripsi = '$deskripsi' WHERE p_id = '$id'");
            echo '<script> location.replace("produk.php"); </script>';
        }
    }
}
?>

            </form>



                                            <a href="product_delete.php?id=<?php echo $row['p_id']?>" class="btn btn-danger w-100">Hapus</a>

                                                
                                            </td>
                                            
                                        </tr>
                                    <?php
                                          }
                                    ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
                <!-- /.container-fluid -->

            <!-- Modal Tambah -->
            <form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                        <div style="font-weight: bold;">Nama Produk</div>
                                            <div class="input-group flex-nowrap mb-3">
                                            <input type="text" name="nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk">
                                            </div>
                                            <div style="font-weight: bold;">Brand</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="brand" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Produk">
                                            </div>
                                            <div class="input-group flex-nowrap mb-3">
                                            <div style="font-weight: bold;">Kategori</div>
                                             <?php
                                                    kategori();
                                            ?>
                                            <br>
                                            </div>
                                            <div style="font-weight: bold;">Keterangan</div>
                                            <div class="input-group flex-nowrap mb-3">
                                             <input type="text" name="ket" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Keterangan Produk">
                                             </div>
                                            <div style="font-weight: bold;">Foto Produk</div>
                                            <div class="mb-3">
                                                <input type="file" name="gambar" class="form-control">
                                            </div>
                                            <div style="font-weight: bold;">Harga</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="number" name="harga" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Harga Produk">
                                            </div>
                                            <div style="font-weight: bold;">stock</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="number" name="stock" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Stock Produk">
                                            </div>
                                            <div style="font-weight: bold;">deskripsi</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="deskripsi" class="form-control"  aria-describedby="addon-wrapping" placeholder="Masukkan Deskripsi Produk">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnTambah" class="btn btn-primary">Tambah Produk</button>
                </div>
                </div>
            </div>
            </div>
            </form>


            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <!-- <span>Copyright &copy; Your Website 2021</span> -->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>

<?php
if(isset($_POST["btnTambah"])){
    $nama = $_POST['nama'];
    $brand = $_POST['brand'];
    $kategori = $_POST['kategori'];
    $ket = $_POST['ket'];
    $stock = $_POST['stock'];
    $price = $_POST['harga'];
    $image = $_FILES['gambar']['name'];
    $deskripsi = $_POST['deskripsi']; 
    $get = "SELECT * FROM produk ORDER BY p_id DESC LIMIT 1 ";
    $dir = "../image/FotoProduk/";
    move_uploaded_file($_FILES['gambar']['tmp_name'], $dir . $image);
    $result = mysqli_query($connection, $get);
    if(mysqli_num_rows($result)){
      if($row = mysqli_fetch_assoc($result)){
        $id_produk = $row['p_id'];
        $get_number = str_replace("P","",$id_produk);
        $id_increase = $get_number+1;
        $get_string = str_pad($id_increase, 5,0, STR_PAD_LEFT);
        $id_baru = "P".$get_string;

        if($nama != NULL && $price != NULL){
            if($foto == NULL){
                insert_product($id_baru,$nama,$brand,$kategori,$ket,$stock,$price,$image,$deskripsi);
                insert_brand($brand); 
                echo '<script> location.replace("produk.php"); </script>';
            }
            else{
                $id_baru = "P00001";
                insert_product($id_baru,$nama,$brand,$kategori,$ket,$stock,$price,$image,$deskripsi);
                insert_brand($brand); 
                echo '<script> location.replace("produk.php"); </script>';
             }
        }

        
      }
    }
}
?>

