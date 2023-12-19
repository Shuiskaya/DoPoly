<?php
  $type = filter_var(trim($_POST['type']), FILTER_SANITIZE_STRING);
  $name = $_COOKIE['student'];
  $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

  if(mb_strlen($type) == 0) {
    echo "Недопустимая длина";
    exit();
  }

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("INSERT INTO `doc` (`name`, `type`, `photo`) VALUES ('$name', '$type', '$photo')");
  $mysqli->close();

  header('Location: /lk.php');
?>
