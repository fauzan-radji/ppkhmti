<?php
include "../utils.php";

if (isset($_POST['submit'])) {
  $first = $_POST['firstName'];
  $last = $_POST['lastName'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $passC = $_POST['checkPass'];
  $full = $first . ' ' . $last;

  if ($pass != $passC) {
    $_SESSION['flashErr'] = 'Password Tidak Sama';
  } else {
    $sql = "INSERT INTO user VALUES('','$full','$email','$pass')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_SESSION['flashSucc'] = "Data Telah Ditambahkan";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="../assetsAdmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assetsAdmin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body style="background-color:#008374">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg" style="margin-top: 170px;">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <?php
              if (isset($_SESSION['flashErr'])) {
              ?>
                <script>
                  Swal.fire(
                    'Error',
                    '<?= $_SESSION['flashErr'] ?>',
                    'error'
                  )
                </script>
              <?php
                unset($_SESSION['flashErr']);
              }
              ?>
              <?php
              if (isset($_SESSION['flashSucc'])) {
              ?>
                <script>
                  Swal.fire(
                    'Sukses',
                    '<?= $_SESSION['flashSucc'] ?>',
                    'success'
                  )
                </script>
              <?php
                unset($_SESSION['flashSucc']);
              }
              ?>
              <form class="user" method="post">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" name="firstName">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name" name="lastName">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" name="email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="checkPass">
                  </div>
                </div>
                <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Submit">
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>



  <!-- Bootstrap core JavaScript-->
  <script src="../assetsAdmin/vendor/jquery/jquery.min.js"></script>
  <script src="../assetsAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../assetsAdmin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assetsAdmin/js/sb-admin-2.min.js"></script>

</body>

</html>