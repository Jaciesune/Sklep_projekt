<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function connect()
{
  $db = new mysqli('localhost', 'root', '', 'sklep-ln');
  if ($db->connect_errno) {
    throw new Exception('Failed to connect to MySQL: (' . $db->connect_errno . ') ' . $db->connect_error);
  }
  return $db;
}
