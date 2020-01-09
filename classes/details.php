<?php

if (isset($_POST['update'])) {
  update();
}

if (isset($_POST['change_password'])) {
  change_password();
}

function update() {

  include 'users.class.php';
  $user = new ManageUsers();

  $username = $_POST['username'];
  $email = $_POST['email'];

  if (empty($username)) {
    header("Location: ../details.php?eu=Username field empty.");
    exit();
  } elseif (empty($email)) {
    header("Location: ../details.php?eu=Email field empty.");
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../details.php?eu=Email is not valid.");
    exit();
  } else {
    $username_availability = $user->GetUserInfo($username);
    if ($username_availability == 0) {
      $update = $user->Update($username, $email);
      if ($update == 1) {
        header("Location: ../details.php?su=Successfully updated info.");
        exit();
      } else {
        header("Location: ../details.php?eu=An error occured. Please try again later.");
        exit();
      }
    } else {
      header("Location: ../details.php?eu=Username already taken.");
      exit();
    }
  }
}

function change_password() {

  include 'users.class.php';
  $user = new ManageUsers();

  $old_password = $_POST['old_password'];
  $password = $_POST['password'];
  $password_repeat = $_POST['password_repeat'];

  if (empty($old_password) || empty($password) || empty($password_repeat)) {
    header("Location: ../details.php?ep=All fields are required.");
    exit();
  } else {
    $old_password = md5($old_password);
    $password = md5($password);
    $password_repeat = md5($password_repeat);
    $check_password = $user->check_password($old_password);
    if ($check_password == 1) {
      if ($password === $password_repeat) {
        $change_password = $user->change_password($password);
        if ($change_password == 1) {
          header("Location: ../details.php?sp=Password successfully changed.");
          exit();
        } else {
          header("Location: ../details.php?ep=An error occured. Please try again later.");
          exit();
        }
      } else {
        header("Location: ../details.php?ep=New passwords do not match.");
        exit();
      }
    } else {
      header("Location: ../details.php?ep=Old password is wrong.");
      exit();
    }
  }
}
 ?>
