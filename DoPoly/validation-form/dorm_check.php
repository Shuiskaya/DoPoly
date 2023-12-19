<?php
  $num = filter_var(trim($_POST['num']), FILTER_SANITIZE_STRING);
  $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
  $descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);
  $photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));

  if(mb_strlen($num) == 0) {
    echo "Недопустимая длина номера общежития";
    exit();
  } else if(mb_strlen($address) == 0) {
    echo "Недопустимая длина адреса";
    exit();
  } else if(mb_strlen($descr) == 0) {
    echo "Недопустимая длина описания";
    exit();
  }

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("INSERT INTO `dorm` (`num`, `address`, `photo`, `descr`) VALUES ('$num', '$address', '$photo', '$descr')");
  $mysqli->close();

  header('Location: /lk.php');
?>
