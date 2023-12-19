<?php
  $status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
  $id = $_POST['id'];

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("UPDATE `request` SET `status`='$status' WHERE `id`='$id'");
  $mysqli->close();

  header('Location: /req_adm.php');
?>
