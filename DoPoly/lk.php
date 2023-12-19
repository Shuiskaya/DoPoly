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
          <li><a href="index.php" class="nav-link px-4 link-secondary">Главная</a></li>
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
    <div class="container center mt-4">
      <?php if(!empty($_COOKIE['student'])): ?>
        <h3>Добро пожаловать, <?=$_COOKIE['student']?>.</h3>
        <h6>Чтобы выйти, нажмите <a href="validation-form/exit.php">здесь</a>.</h6><br>
        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Заявка</h2>
              <p>Если необходимо отправить заявку на ремонт или приглашение гостя.</p>
              <a href="request.php" class="btn btn-outline-secondary" type="button">Отправить</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Документ</h2>
              <p>Если необходимо отправить справки или иные документы.</p>
              <a href="doc.php" class="btn btn-outline-secondary" type="button">Отправить</a>
            </div>
          </div>
        </div><br>
        <h3>Ваши заявки и документы:</h3><br>
        <?php
          $mysql = new mysqli('localhost', 'root', '', 'dopoly');
          $un =$_COOKIE['student'];
          $result = $mysql->query("SELECT * FROM `request` WHERE `name` = '$un'");
          while ($request = $result->fetch_assoc()) { ?>
            <h5>Заявка: <?php echo $request['type']; ?></h5>
            <?php if($request['comment'] != '') {?>
              <h6>Комментарий: <?php echo $request['comment']; ?></h6>
            <?php } ?>
            <h6>Статус: <?php echo $request['status']; ?> </h6><br>
            <?php
          }
          $result = $mysql->query("SELECT * FROM `doc` WHERE `name` = '$un'");
          while ($doc = $result->fetch_assoc()) { ?>
            <h5>Документы: <?php echo $doc['type']; ?></h5>
            <h6>Статус: <?php echo $doc['status']; ?> </h6><br>
            <?php
          }
          $mysql->close();
        ?>
      <?php endif;?>
      <?php if(!empty($_COOKIE['staff'])): ?>
        <h3>Добро пожаловать, <?=$_COOKIE['staff']?>.</h3>
        <h6>Чтобы выйти, нажмите <a href="validation-form/exit.php">здесь</a>.</h6><br>
        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Заявки</h2>
              <p>Просмотр отправленных заявок на ремонт или приглашение гостя.</p>
              <a href="req_adm.php" class="btn btn-outline-secondary" type="button">Просмотр</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Документы</h2>
              <p>Просмотр отправленных справок или иных документов.</p>
              <a href="doc_adm.php" class="btn btn-outline-secondary" type="button">Просмотр</a>
            </div>
          </div>
        </div><br>
        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Добавление новости</h2>
              <p>Добавить новость на главную страницу.</p>
              <a href="add_news.php" class="btn btn-outline-secondary" type="button">Добавить</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Добавление общежития</h2>
              <p>Добавить информацию о новом общежитии.</p>
              <a href="add_dorm.php" class="btn btn-outline-secondary" type="button">Добавить</a>
            </div>
          </div>
        </div><br>
        <div class="row align-items-md-stretch">
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Удаление новости</h2>
              <p>Удалить новость с главной страницы.</p>
              <form action="validation-form/delete_news.php" method="post">
                <input type="text" class="form-control" name="title" id="title" placeholder="Введите заголовок новости"><br>
                <button class="btn btn-primary" type="submit" name="button">Удалить</button>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="h-100 p-5 bg-body-tertiary border rounded-3">
              <h2>Удаление общежития</h2>
              <p>Удалить инфомацию об общежитии.</p>
              <form action="validation-form/delete_dorm.php" method="post">
                <input type="text" class="form-control" name="num" id="num" placeholder="Введите номер общежития"><br>
                <button class="btn btn-primary" type="submit" name="button">Удалить</button>
              </form>
            </div>
          </div>
        </div><br>
      <?php endif;?>
    </div>
  </body>
</html>
