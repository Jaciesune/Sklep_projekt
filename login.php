<?php
include_once "connect.php";

$conn = connect();

$login = $_POST['login'];
$pass = $_POST['pass'];

$q1 = "SELECT `user_id`,`password` FROM users WHERE username = '$login'";
$query = $conn->query($q1);
$res = $query->fetch_object();

if(password_verify($pass, $res->password)){
  header('Location: index.php');
} else {
  header('Location: login_form.php');
}

$conn->close();