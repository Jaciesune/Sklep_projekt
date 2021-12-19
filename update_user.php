<?php
include_once "connect.php";
header('Location: index.php');
$conn = connect();

$user = $_SESSION['userID'];

$login = $_POST['login'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$e_mail = $_POST['mail'];
$pass = $_POST['pass'];
$phone_number = $_POST['phone_number'];
$woj = $_POST['woj'];
$city_name = $_POST['city_name'];
$st_name = $_POST['street_name'];
$house_nr = $_POST['house_nr'];
$apart_nr = $_POST['apart_nr'];


$pass_hash = password_hash($pass, NULL);

$q1 = "UPDATE `users` SET username = '$login', name = '$name', family_name = '$last_name', `e-mail` = '$e_mail', adress = '$user', `password` = '$pass_hash' WHERE user_id = '$user'";

$q2 = "UPDATE `adressess` SET phone_number = '$phone_number', wojewodztwo = '$woj', city_name = '$city_name', street_number = '$st_name', house_number = '$house_nr', apartment_number = '$apart_nr' WHERE adress_id = '$user'";

$conn->query($q1);
$conn->query($q2);
$conn->close();