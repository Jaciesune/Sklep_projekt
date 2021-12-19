</body>

</html>
<?php 
if (isset($_SESSION["userID"])) {
  $json=json_encode($USER_DATA);
  $query="UPDATE users SET data='{$json}' where user_id={$_SESSION["userID"]}";
  $res = $db->query($query);
}
$conn->close();
?>