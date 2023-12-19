<?php
  if ($_COOKIE['student'] == '')
    setcookie('staff', $staff['name'], time() - 3600 * 24, "/");
  else {
    setcookie('student', $student['name'], time() - 3600 * 24, "/");
  }
  header('Location: /');
?>
