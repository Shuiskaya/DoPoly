<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>DoPoly</title>
  </head>
  <body>
    <div class="container">
      <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <h5 class="my-0 mr-md-auto font-weight-normal">Moscow Polytech</h5>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-4">Главная</a></li>
          <li><a href="dorm.php" class="nav-link px-4 link-secondary">Общежития</a></li>
          <li><a href="contacts.php" class="nav-link px-4 link-secondary">Контакты</a></li>
        </ul>

        <div class="col-md-4 text-end">
          <?php if(($_COOKIE['student'] == '') && ($_COOKIE['staff'] == '')): ?>
            <a href="registr.php" class="btn btn-outline-primary me-4">Зарегистрироваться</a>
            <a href="login.php" class="btn btn-primary">Войти</a>
          <?php else:?>
            <a href="lk.php" class="btn btn-primary">Личный кабинет</a>
          <?php endif;?>
        </div>
      </header>
    </div>
    <div class="container">
      <h2>Новости</h2><br>
      <?php
        $mysql = new mysqli('localhost', 'root', '', 'dopoly');
        $result = $mysql->query("SELECT * FROM `news`");
        while ($news = $result->fetch_assoc()) { ?>
          <h4><?php echo $news['title']; ?></h4><br>
          <img width="700" height="500" src="data:image/jpeg;base64, <?php echo base64_encode($news['photo']); ?>" alt=""><br><br>
          <h6><?php echo $news['descr']; ?> </h6><br><br>
          <?php
        }
      ?>
    </div>
  </body>
</html>
