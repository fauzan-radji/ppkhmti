<?php
include "../koneksi.php";
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
  <link rel="stylesheet" href="../assets/css/login.css" />

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

  <div class="login-wrapper">
    <form action="" method="post" class="form">
      <!-- <img src="img/avatar.png" alt=""> -->
      <h2>Login</h2>
      <div class="input-group">
        <input type="email" name="email" id="loginUser" required />
        <label for="loginUser">Email</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="loginPassword" required />
        <label for="loginPassword">Password</label>
      </div>
      <button type="submit" name="submit" class="submit-btn">Login</button>
      <a href="../index.php" class="forgot-pw">&laquo; Kembali ke Beranda</a>
      <!-- <a href="#forgot-pw" class="forgot-pw">Forgot password?</a> -->
    </form>

    <!-- <div id="forgot-pw">
      <form action="" class="form">
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>
        <div class="input-group">
          <input type="email" name="email" id="email" required />
          <label for="email">Email</label>
        </div>
        <input type="submit" value="Submit" class="submit-btn" />
      </form>
    </div> -->
  </div>
</body>

</html>