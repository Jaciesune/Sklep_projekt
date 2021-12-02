<?php
include_once "connect.php";
header('Location: index.php');
$conn = connect();

$login = $_POST['login'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$e_mail = $_POST['mail'];
$pass = $_POST['pass'];

$pass_hash = password_hash($pass, NULL);

$q1 = "INSERT INTO `users` (`user_id`, `username`, `name`, `family_name`, `password`, `e-mail`) VALUES (NULL, '$login', '$name', '$last_name', '$pass_hash', '$e_mail')";

$conn->query($q1);
$conn->close();