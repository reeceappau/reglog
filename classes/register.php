<?php
if (isset($_POST['register'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);
  $password_repeat = md5($_POST['password_repeat']);
  $ip_address = $_SERVER['REMOTE_ADDR'];
  $date = date("Y-m-d");
  $time = date("H:i:s");

  if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
    header("Location: ../register.php?e=All fields are required.");
    exit();
  } elseif ($password !== $password_repeat) {
    header("Location: ../register.php?e=Passwords do not match.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?e=Please enter a valid email.");
    exit();
  } else {
    $username_availability = $user->GetUserInfo($username);
    if ($username_availability == 0) {
      $register_user = $user->Register($username, $password, $email, $ip_address, $time, $date);
      if ($register_user == 1) {
        header("Location: ../login.php?s=Successfully registered, login now.");
        exit();
      }
    } else {
      header("Location: ../register.php?e=Username already taken.");
      exit();
    }
  }
}
 ?>
