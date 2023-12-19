<?php
  $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("DELETE FROM `news` WHERE `title` = '$title' LIMIT 1");
  $mysqli->close();

  header('Location: /lk.php');
?>
