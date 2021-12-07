<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
session_start();


function connect()
{
  $db = new mysqli('localhost', 'root', '');
  if ($db->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $db->connect_errno . ') ' . $db->connect_error);
  }
  try{
    $db->select_db("Sklep-ln");
    } catch (mysqli_sql_exception){
    $db->query("CREATE DATABASE `Sklep-ln` character set utf8mb4 COLLATE utf8mb4_general_ci");
    $db->select_db("Sklep-ln");
    $query=file_get_contents("./sklep-ln.sql");
    $db->multi_query($query);
  };
  
  return $db;
}
