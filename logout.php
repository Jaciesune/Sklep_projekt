<?php
include_once "connect.php";

unset($_SESSION["userID"]);
header("Location: index.php");