<?php
include_once "connect.php";
header('Location: index.php');
$conn = connect();

$login = $_POST['login'];
$name = $_POST['name'];
$last_name = $_POST['last_name'];
$e_mail = $_POST['mail'];
$pass = $_POST['pass'];
$phone_number = $_POST['phone_number'];
$woj = $_POST['woj'];
$city_name = $_POST['city_name'];
$st_name = $_POST['st_nr'];
$house_nr = $_POST['house_nr'];
$apart_nr = $_POST['apart_nr'];


$pass_hash = password_hash($pass, NULL);

$q2 = "INSERT INTO `adressess` (`adress_id`, `phone_number`, `wojewodztwo`, `city_name`, `street_number`, `house_number`, `apartment_number`) VALUES (NULL, '$phone_number', '$woj', '$city_name', '$st_name', '$house_nr', '$apart_nr')";

$conn->query($q2);
$q3 = "SELECT * FROM adressess ORDER BY adress_id DESC LIMIT 1";
$adress_id = $conn->query($q3)->fetch_object()->adress_id;

$q1 = "INSERT INTO `users` (`user_id`, `username`, `name`, `family_name`, `password`, `e-mail`, `adress`, `role`) VALUES (NULL, '$login', '$name', '$last_name', '$pass_hash', '$e_mail', '$adress_id', 0)";


$conn->query($q1);

$conn->close();