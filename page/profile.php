<?php
include('../function/function.php');
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
    <title>Profile</title>
    <link rel="shortcut icon" href="../image/logo/vapetime.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</head>
<body>
<?php
card_profil($nama,$alamat);
?>

<footer>
	<?php footer(); ?>
</footer>
</body>
</html>