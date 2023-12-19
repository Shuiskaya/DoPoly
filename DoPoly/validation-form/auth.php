<?php
  $phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
  $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

  $pass = md5($pass."4fdsf32fsd");

  $mysql = new mysqli('localhost', 'root', '', 'dopoly');
  $result = $mysql->query("SELECT * FROM `students` WHERE `phone` = '$phone' AND `pass` = '$pass'");
  $student = $result->fetch_assoc();
  $result2 = $mysql->query("SELECT * FROM `staff` WHERE `phone` = '$phone' AND `pass` = '$pass'");
  $staff = $result2->fetch_assoc();

  if(count($student) == 0 && count($staff) == 0) {
    echo "Пользователь не найден";
    exit();
  } elseif (count($staff) == 0) {
    setcookie('student', $student['name'], time() + 3600 * 24, "/");
  } else {
    setcookie('staff', $staff['name'], time() + 3600 * 24, "/");
  }

  $mysql->close();
  header('Location: /lk.php');
?>
