<?php
$about = mysqli_query($connection, "SELECT * FROM company");
  while ($row = mysqli_fetch_array($about)) {
    $company_name = $row['nama'];
    $company_add = $row['alamat'];
    $company_img = $row['img'];
    $company_logo = $row['logo'];
    $company_email = $row['email'];
    $company_no = $row['nomor_telp'];
  }
  ?>