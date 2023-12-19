<?php
  $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
  $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
  $dorm = filter_var(trim($_POST['dorm']), FILTER_SANITIZE_STRING);

  if(mb_strlen($name) == 0) {
    echo "Недопустимая длина ФИО";
    exit();
  } else if(mb_strlen($phone) != 11) {
    echo "Недопустимая длина номера телефона";
    exit();
  } else if(mb_strlen($pass) == 0) {
    echo "Недопустимая длина пароля";
    exit();
  }
  else if(mb_strlen($dorm) == 0) {
    echo "Неверный номер общежития";
    exit();
  }

  $pass = md5($pass."4fdsf32fsd");

  $mysqli = new mysqli('localhost', 'root', '', 'dopoly');
  $mysqli->query("INSERT INTO `students` (`name`, `phone`, `pass`, `dorm`) VALUES ('$name', '$phone', '$pass', '$dorm')");
  $result = $mysqli->query("SELECT * FROM `students` WHERE `phone` = '$phone' AND `pass` = '$pass'");
  $student = $result->fetch_assoc();
  if(count($student) == 0) {
    echo "Пользователь не найден";
    exit();
  }
  setcookie('student', $student['name'], time() + 3600 * 24, "/");
  $mysqli->close();

  header('Location: /lk.php');
?>
