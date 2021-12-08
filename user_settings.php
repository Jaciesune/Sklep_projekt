<?php
include_once "components/head.php";
include_once "components/header.php";
include_once "components/nav.php";

$conn = connect();
$usr_id = $_SESSION['userID'];
$q1 = "SELECT * FROM users WHERE user_id = $usr_id";

$res = $conn->query($q1);
$row = $res->fetch_object();

echo $row->username;
echo $row->name;
echo $row->family_name;
echo $row->{'e-mail'};
echo $row->adress;














include_once "components/footer.php";
include_once "components/foot.php";
