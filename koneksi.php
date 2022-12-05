<?php
include 'utils.php';

$conn = mysqli_connect(
  env('DB_HOST'),
  env('DB_USERNAME'),
  env('DB_PASSWORD'),
  env('DB_DATABASE'),
  env('DB_PORT')
);
