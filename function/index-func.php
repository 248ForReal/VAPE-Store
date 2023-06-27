<?php
include("lib/connect.php");

function kepala($nama)
{
?>
  <header>
  <div class="company-logo" style="font-weight: bold;">
  <img src="image/logo/vapetime.png" style="width: 80px; height: 80px;">
  <p style="margin-left: 10px; font-family: 'Arial', sans-serif;">VapeTimes</p>
</div>

  </div>
    <nav class="navbar">
      <ul class="nav-items">
        <form class="d-flex" method="POST">
          <input name="cari" class="form-control me-2" type="text" placeholder="Cari disini...">
          <input type="submit" name="btnCari" class="btn btn-warning" value="Cari">
        </form>
        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="page/product.php" class="nav-link">Product</a></li>
        <?php
        if ($nama != null) {
        ?>
          <li class="nav-item"><a href="page/profile.php" class="nav-link"><i class="bi bi-person-fill"></i> <?= $nama ?></a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link"><i class="bi bi-box-arrow-in-left"></i></i> Keluar</a></li>
        <?php
        } else {
        ?>
          <li class="nav-item"><a href="login.php" class="nav-link"><i class="bi bi-box-arrow-in-right"></i></i></i> Login</a></li>
        <?php
        }
        ?>

      </ul>
    </nav>
  </header>
  <?php
  if (isset($_POST['btnCari'])) {
    $cari = $_POST['cari'];
    echo '<script>location.replace("page/product.php?search=' . $cari . '");</script>';
  }
}

function slider()
{
  global $connection;
?>
  <div class="row">
    <div class="col-md-12 bg-dark pb-3">
      <!-- Carousel -->
      <?php
      $i = 0;
      $slider = mysqli_query($connection, "SELECT gambar FROM slider");
      while ($row = mysqli_fetch_array($slider)) {
        $i++;
        if ($i != 0 && $i <= 1) {
      ?>
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
            <?php
          }
          if ($i == 1) {
            ?>
              <div class="carousel-item active">
                <img src="image/slider/<?php echo $row['gambar']; ?>" class="d-block w-100">
              </div>
            <?php
          }
          if ($i != 1) {
            ?>
              <div class="carousel-item">
                <img src="image/slider/<?php echo $row['gambar']; ?>" class="d-block w-100">
              </div>
          <?php
          }
        }
          ?>
          <?php
          if ($i != 0 && $i >= 1) {
          ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        <?php
          }
        ?>
        <!-- Carousel End -->
    </div>
  </div>
  <?php
  $about = mysqli_query($connection, "SELECT * FROM company");
  while ($row = mysqli_fetch_array($about)) {
    $company_add = $row['alamat'];
    $company_img = $row['img'];
    $company_email = $row['email'];
    $company_no = $row['nomor_telp'];
  }
  ?>
  <div class="row mt-3">
    <div class="col-md-1 text-break text-white p-3 align-self-center bg-warning">
    </div>
    <div class="col-md-5 p-3 bg-dark">
      <img src="image/logo/<?php echo $company_img ?>" class="img-thumbnail" alt="...">
    </div>
    <div class="col-md-6 text-break text-white p-4 fs-6 align-self-center bg-warning" align="justify">
      <?php
      echo "Alamat : " . $company_add . "<br />";
      echo "Email : " . $company_email . "<br />";
      echo "Handphone : " . $company_no;
      ?>
    </div>
  </div>
<?php
}

function footer()
{
?>
  <div class="container end-footer">
    <div class="copyright">copyright © 2023 - Present • <b>MANAJEMEN INFORMATIKA</b></div>
    <a class="designer" href="#">Karpat group</a>
  </div>
<?php
}

?>