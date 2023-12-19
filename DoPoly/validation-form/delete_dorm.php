<?php
  $num = filter_var(trim($_POST['num']), FILTER_SANITIZE_STRING);

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("DELETE FROM `dorm` WHERE `num` = '$num' LIMIT 1");
  $mysqli->close();

  header('Location: /lk.php');
?>
