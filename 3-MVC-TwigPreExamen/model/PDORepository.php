<?php

abstract class PDORepository {

  const USERNAME = "root";
  const PASSWORD = "alumno";
	const HOST ="127.0.0.1";
	const DB = "distribuidora";

  private function getConnection(){
      $u=self::USERNAME;
      $p=self::PASSWORD;
      $db=self::DB;
      $host=self::HOST;
      $connection = new PDO("mysql:dbname=$db;host=$host", $u, $p);
      return $connection;
  }

  protected function executeQuery($sql, $args=null)
  {
    $connection = $this->getConnection();
    $stmt = $connection->prepare($sql);
    if (!is_null($args)){
      $stmt->execute($args);
    } else {
      $stmt->execute();
    }
    return $stmt;
  }

}
