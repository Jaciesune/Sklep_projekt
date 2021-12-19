<?php
include_once "connect.php";
header('Location: index.php');
$conn = connect();

$user = $_SESSION['userID'];
$q = "DELETE FROM `users` WHERE user_id = $user";
$conn->query($q);
header("Location: logout.php");

$conn->close();