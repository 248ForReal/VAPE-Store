<?php
include "../function/function.php";
include "../lib/connect.php";
include "company_info.php";
session_start();

if (isset($_POST['btnEdit'])) {
  $userid = $_POST['userId'];
  $nama = $_POST['nama'];
  $nohp = $_POST['nohp'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashed_password = md5($password);

  $sql = "UPDATE user SET nama = '$nama', nohp = '$nohp', alamat = '$alamat', email = '$email', password = '$hashed_password' WHERE userId = '$userid'";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    echo '<script>location.replace("user.php");</script>';
    exit();
  } else {
    echo "Error: " . mysqli_error($connection);
    exit();
  }
}
?>

<!DOCTYPE html>
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
                        <div class="card-header py-3"></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="40%">Nama</th>
                                            <th width="15%">Nomor Handphone</th>
                                            <th width="20%">Alamat</th>
                                            <th width="20%">Email</th>
                                            <th width="15%">Password</th>
                                            <th width="15%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $user = mysqli_query($connection, "SELECT * FROM user where akses='2'");
                                        $no = 0;
                                        while ($row = mysqli_fetch_array($user)) {
                                            $no++;
                                            $userid = $row['userId'];
                                            $nama = $row['nama'];
                                            $nohp = $row['nohp'];
                                            $alamat = $row['alamat'];
                                            $email = $row['email'];
                                            $password = $row['password'];
                                        ?>
                                            <tr>
                                                <td align="center"><?php echo $no; ?></td>
                                                <td><?php echo $nama ?></td>
                                                <td><?php echo $nohp ?></td>
                                                <td><?php echo $alamat ?></td>
                                                <td><?php echo $email ?></td>
                                                <td><?php echo $password ?></td>
                                                <td align="center">
                                                    <button class="btn btn-warning w-100 mb-2" data-toggle="modal" data-target="#editData<?php echo $row['userId'] ?>">Edit</button>

                                                    <!-- Modal Edit -->
                                                    <div class="modal fade" id="editData<?php echo $row['userId'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" enctype="multipart/form-data">
                                                                        <input type="hidden" name="userId" value="<?php echo $row['userId'] ?>">
                                                                        <table class="table table-borderless">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="align-self-center">
                                                                                        <div style="font-weight: bold;">Nama Pengguna</div>
                                                                                        <div class="input-group flex-nowrap mb-3 w-50">
                                                                                            <input type="text" name="nama" class="form-control" aria-describedby="addon-wrapping" placeholder="Nama Pengguna" value="<?php echo $nama ?>">
                                                                                        </div>
                                                                                        <div style="font-weight: bold;">Nomor Handphone</div>
                                                                                        <div class="input-group flex-nowrap mb-3 w-50">
                                                                                            <input type="text" name="nohp" class="form-control" aria-describedby="addon-wrapping" placeholder="Nomor Handphone Pengguna" value="<?php echo $nohp ?>">
                                                                                        </div>
                                                                                        <div style="font-weight: bold;">Alamat</div>
                                                                                        <div class="input-group flex-nowrap mb-3 w-50">
                                                                                            <input type="text" name="alamat" class="form-control" aria-describedby="addon-wrapping" placeholder="Alamat Pengguna" value="<?php echo $alamat ?>">
                                                                                        </div>
                                                                                        <div style="font-weight: bold;">Email</div>
                                                                                        <div class="input-group flex-nowrap mb-3 w-50">
                                                                                            <input type="email" name="email" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan Harga Produk" value="<?php echo $email ?>">
                                                                                        </div>
                                                                                        <div style="font-weight: bold;">Password</div>
                                                                                        <div class="input-group flex-nowrap mb-3 w-50">
                                                                                            <input type="password" name="password" class="form-control" aria-describedby="addon-wrapping" placeholder="Masukkan password">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                                                            <button type="submit" name="btnEdit" class="btn btn-primary">Simpan Perubahan</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="user_delete.php?id=<?php echo $row['userId'] ?>" class="btn btn-danger w-100">Hapus</a>
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
