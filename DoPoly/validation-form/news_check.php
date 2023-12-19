<?php
  $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
  $descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);
  $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

  if(mb_strlen($title) == 0) {
    echo "Недопустимая длина номера общежития";
    exit();
  } else if(mb_strlen($descr) == 0) {
    echo "Недопустимая длина описания";
    exit();
  }

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("INSERT INTO `news` (`title`, `photo`, `descr`) VALUES ('$title', '$photo', '$descr')");
  $mysqli->close();

  header('Location: /lk.php');
?>
