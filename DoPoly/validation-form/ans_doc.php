<?php
  $status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
  $id = $_POST['id'];

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("UPDATE `doc` SET `status`='$status' WHERE `id`='$id'");
  $mysqli->close();

  header('Location: /doc_adm.php');
?>
