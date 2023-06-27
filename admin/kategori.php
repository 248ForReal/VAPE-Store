<!DOCTYPE html>
<?php
    include "../lib/connect.php";
    include "company_info.php";
 
  
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
                            <h6 class="m-0 font-weight-bold text-primary">Data Kategori</h6>
                        </div>
                        <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahData">
                        Tambah Kategori
                        </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="45%">Nama Kategori</th>
                                            <th width="20%">Jumlah Produk</th>
                                            <th width="20%">Aksi</th>
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
                                    $kategori = mysqli_query($connection, "SELECT * FROM categori");
                                        $no = 0;
                                          while ($row = mysqli_fetch_array($kategori)){

                                            $no++;
                                            $id = $row['c_id'];
                                            $nama = $row['nama'];
                                            $jmlproduk = mysqli_query($connection, "SELECT COUNT(nama) AS jmlproduk FROM produk WHERE kategori = '$nama'");
                                            while ($row2 = mysqli_fetch_array($jmlproduk)){
                                                $jml = $row2['jmlproduk'];
                                            }

                                    ?>
                                        <tr>
                                            <td align="center"><?php echo $no;?></td>
                                            <td><?php echo $nama?></td>
                                            <td align="center"><?php echo $jml?> Produk</td>
                                            <td align="center">
                                            <button class="btn btn-warning w-100 mb-2" data-toggle="modal" data-target="#editData<?php echo $id?>">
                                                Edit
                                            </button>

<!-- Modal Edit -->
<form method="POST" enctype="multipart/form-data">
            <div class="modal fade" id="editData<?php echo $row['c_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <input type="hidden" name="c_id" value="<?php echo $row['c_id'] ?>">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Kategori" value="<?php echo $nama?>">
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
    $e_nama = $_POST['nama'];
    $id = $_POST['c_id'];
    $sql = "UPDATE categori SET nama = '$e_nama' WHERE c_id = '$id'";
    $result = mysqli_query($connection, $sql); 
    echo '<script> location.replace("kategori.php"); </script>';
   
    


}
?>
            </form>
                                            <a href="kategori_delete.php?id=<?php echo $row['c_id']?>" class="btn btn-danger w-100">Hapus</a>   
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                        <td class="align-self-center">
                                            <div style="font-weight: bold;">Nama Kategori</div>
                                            <div class="input-group flex-nowrap mb-3">
                                                <input type="text" name="p_nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Nama Kategori">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button name="btnTambah" class="btn btn-primary">Tambah Kategori</button>
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
    $nama = $_POST['p_nama'];
    if($nama != NULL){
        $tambah = mysqli_query($connection,"INSERT INTO categori VALUES(NULL,'$nama','')");
         echo '<script> location.replace("kategori.php"); </script>';
    
    }
}
?>

