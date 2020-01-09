<?php

  class Dbh {
    private $hostname;
    private $username;
    private $password;
    private $dbname;

    public function connect() {
      $this->hostname = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "reglog";

      try {
        $dsn = "mysql:host=".$this->hostname.";dbname=".$this->dbname;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
      } catch (PDOException $e) {
        echo "<b>Connection failed: </b>".$e->getMessage();
      }
    }
  }

  $a = new Dbh;

 ?>
