<?php
session_start();

if (isset($_POST['login'])) {

  include 'users.class.php';
  $user = new ManageUsers();

  $email = $_POST['email'];
  $password = md5($_POST['password']);

  if (empty($email) || empty($password)) {
    header("Location: ../login.php?e=All fields are required.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../login.php?e=Email is not valid.");
    exit();
  } else {
    $login_user = $user->Login($email, $password);
    if ($login_user == 1) {
      $create_session = $user->create_session($email);
      header("Location: ../index.php?s=Successfully logged in.");
      exit();
    } else {
      header("Location: ../login.php?e=Incorrect email and password combination.");
      exit();
    }
  }
}
 ?>
