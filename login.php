<?php
include('lib/connect.php');

// Fungsi untuk membersihkan input pengguna
function sanitize($data) {
  global $connection;
  return mysqli_real_escape_string($connection, trim($data));
}

if (isset($_POST['login'])) {
  $user = sanitize($_POST['email']);
  $pass = sanitize($_POST['pass']);
  $hashed_password = md5($pass);
  $sql = "SELECT * FROM user WHERE email = '$user' AND password = '$hashed_password'";
  $result = mysqli_query($connection, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    session_start();
    $_SESSION['login'] = $user;
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['nohp'] = $row['nohp'];
    $_SESSION['alamat'] = $row['alamat'];
    $_SESSION['userId'] = $row['userId'];

    if ($row['akses'] == 1) {
      header('Location: admin/index.php');
      exit();
    } else if ($row['akses'] == 2) {
      header('Location: index.php');
      exit();
    }
  } else {
    header('Location: login.php?error');
    exit();
  }
}

if (isset($_POST['regis'])) {
  $nama = sanitize($_POST['nama']);
  $nohp = sanitize($_POST['nohp']);
  $alamat = sanitize($_POST['alamat']);
  $email = sanitize($_POST['email']);
  $pass = sanitize($_POST['pass']);
  $hashed_password = md5($pass);
  $akses = '2';

  $sql = "INSERT INTO user (email, password, nama, nohp, alamat, akses) VALUES ('$email', '$hashed_password', '$nama', '$nohp', '$alamat', '$akses')";
  $result = mysqli_query($connection, $sql);

  if ($result) {
    echo "<script>alert('Berhasil Sign Up');document.location.href='login.php';</script>";
    exit();
  } else {
    echo "Error: " . mysqli_error($connection);
    exit();
  }
}

if (isset($_POST['guest'])) {
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vapetime Account</title>
  <link rel="shortcut icon" href="../image/logo/vapetime.png" type="image/x-icon">
  <link rel="stylesheet" href="style/coba.css">
</head>
<body>

<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="" method="POST">
			<h1>Create Account</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>or use your email for registration</span>
			<input type="text" name="nama" placeholder="Nama Lengkap" />
			<input type="text" name="nohp" placeholder="No handphone/whatsapp aktif" />
			<input type="text" name="alamat" placeholder="Kota/Kabupaten" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="pass" placeholder="Password" />
			<button type="submit" name="regis" >Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="POST">
			<h1>Sign in</h1>
			<!-- <div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div> -->
			<span>or use your account</span>
			<?php
				if(isset($_GET['error'])){
	  				echo "<p style='color:red; font-size:.8em; margin-top:.5rem'>* Username atau password salah!</p>";
				}
			?>
			<input type="email" name="email" placeholder="Email"  />
			<input type="password" name="pass" placeholder="Password"/>
			<!-- <a href="#">Forgot your password?</a> -->
			<button type="submit" name="login">Sign In</button>
			<br>
			<button type="submit" name="guest">Guest</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>



  <script>
 const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


</script>

</body>
</html>
