<?php
include "../utils.php";

if (isset($_SESSION['nama'])) {
  setError("Kamu sudah login");
  redirect("../dashboard.php");
}

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION['nama'] = $row['nama'];
    setSuccess("Sukses Login Sebagai {$row['nama']}");

    redirect("../dashboard.php");
  } else {
    setError("Email Atau Password Salah");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/newLogin.css" />
  <!-- SweetAlert -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <title>Login</title>
</head>
<body>
  <?php
  if (isset($_SESSION['flashErr'])) :
  ?>
    <script>
      Swal.fire({
        title: 'Error',
        html: '<?= $_SESSION['flashErr'] ?>',
        icon: 'error',
      })
    </script>

  <?php
    unset($_SESSION['flashErr']);
  endif;

  if (isset($_SESSION['flashSucc'])) :
    
  ?>
    <script>
      Swal.fire({
        title: 'Error',
        html: '<?= $_SESSION['flashSucc'] ?>',
        icon: 'error',
      })
    </script>
    

  <?php

    unset($_SESSION['flashSucc']);

  endif;
  ?>
<div class="newcontainer" id="newcontainer">
		<div class="form-container sign-in-container">
			<form action="" method="post">
				<h1>Masukan Akun</h1>
				<span>Silahkan Masukan Akun Anda!</span>
				<input type="email" placeholder="Email" id="loginUser" name="email" required />
				<input type="password" placeholder="Password" name="password" id="loginPassword" required />
				<button type="submit" name="submit" style="margin-bottom: 25px;">Masuk</button>
        <button class="mobile" style="display :none;">
						<a href="../index.php" style="color:white ; border-color:aquamarine; margin: top 20px; ">Kembali</a>
					</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Halo!</h1>
					<p>Selamat Datang!</p>
					<button class="ghost">
						<a href="../index.php" style="color:white ;">Kembali</a>
					</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>