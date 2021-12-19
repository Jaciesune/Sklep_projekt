<?php 
include_once "connect.php";
$conn = connect();

$USER_DATA=[];
if (isset($_SESSION["userID"])) {
  $db = connect();
    $query="SELECT data FROM users where user_id={$_SESSION["userID"]}";
    $res = $db->query($query);
    $dane = $res->fetch_object()->data;
    $USER_DATA=json_decode($dane, true);
    if($USER_DATA==NULL){
      $USER_DATA=[];
    }
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="styles/style_form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
  <script src="main.js"></script>
  <title>Strona główna sklepu</title>
</head>
<body>
<?php  

include_once "alert.php";
