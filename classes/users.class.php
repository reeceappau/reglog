<?php
  session_start();
  include_once 'db.class.php';

  class ManageUsers {
    public $dbh;

    function __construct() {
      $db_connection = new Dbh;
      $this->dbh = $db_connection->connect();
      return $this->dbh;
    }

    function Register($username, $password, $email, $ip_address, $time, $date) {
      $query = $this->dbh->prepare("INSERT INTO users (username, password, email, ip_address, time, date) VALUES (?,?,?,?,?,?)");
      $values = array($username, $password, $email, $ip_address, $time, $date);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Login($email, $password) {
      $query = $this->dbh->prepare("SELECT * FROM users WHERE email=? AND password=?");
      $values = array($email, $password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function Update($username, $email) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET username='$username', email='$email' WHERE ID = $id;");
      $values = array($username, $email);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function change_password($password) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->prepare("UPDATE users SET password='$password' WHERE ID = $id;");
      $values = array($password);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      return $resultCheck;
    }

    function GetUserInfo($username) {
      $query = $this->dbh->prepare("SELECT * FROM users WHERE username=?");
      $values = array($username);
      $query->execute($values);
      $resultCheck = $query->rowCount();
      if ($resultCheck == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $resultCheck;
      }
    }

    function create_session($email) {
      $query = $this->dbh->query("SELECT * FROM users WHERE email='$email'");
      $user = $query->fetch();
      $_SESSION['ID'] = $user['ID'];
      $_SESSION['username'] = $user['username'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['logged_in'] = 1;
    }

    function check_password($old_password) {
      $id = $_SESSION['ID'];
      $query = $this->dbh->query("SELECT password FROM users WHERE ID='$id'");
      $results = $query->fetch();
      $password = $results['password'];
      if ($password === $old_password) {
        $result = 1;
        return $result;
      } else {
        $result = 0;
        return $result;
      }
    }

    function get_details($username) {
      $query = $this->dbh->query("SELECT * FROM users WHERE username='$username'");
      $results = $query->fetch();
      return $results;
    }


  }

 ?>
