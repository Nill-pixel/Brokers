<?php


class DB
{
  public static function getConnection()
  {
    try {
      $pdo = new PDO("mysql:dbname=broker;host=localhost", "root", "");
      return $pdo;
    } catch (PDOException $err) {
    }
  }
}
