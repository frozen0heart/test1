<?php
require "connection.php";

if(isset($_POST['pass'])) {
  require "files/login/login.php";
}

if(isset($_POST['off'])) {
  unset($_SESSION['admin_id']);
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=1100px, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/formsubmit.js"></script>
<link rel="stylesheet" href="css/css.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
<title>Тестовое задание</title>
</head>
<body style="background: #111111; color: white;">
<div class="container">

  <?php if ($_SESSION['admin_id']) { ?>

  <div style="text-align: center; font-size: 25px;"><b><?=$_SESSION['admin_login']?></b>, режим администратора включён!</div>
    <form action="/login.php" method="post">
      <div class="d-flex gap-5 justify-content-center">
        <button class="btn btn-danger" type="submit" name="off" id="off">Отключить режим администратора</button>
      </div>
    </form>
  </div>

  <?php } else { ?>

  <div style="text-align: center; font-size: 25px;">Админ-панель</div>
  <form action="/login.php" method="post">
    <br>
    <div class="d-flex gap-5 justify-content-center">
      <input type="password" name="pass" id="pass" placeholder="Пароль" class="form-control" style="width: 40%" autocomplete="off" required>
    </div>

    <?php if ($error == '1') { ?>
    <div class="d-flex gap-5 justify-content-center">
      <div style="color: red; width: 40%">Не найден администратор!</div>
    </div>
    <?php } else { ?> <br> <?php } ?>
  </form>
</div>
<?php } ?>

<div class="d-flex gap-5 justify-content-center">
  <button type="button" class="btn btn-success" onclick="window.location.href = '/';">На главную</button>
</div>

<?php if ($_SESSION['admin_id']) { ?>

<div class="container">

  <div class="row mb-4 text-center" style="background: gray;">
    <div class="col-4 themed-grid-col">Описание</div>
    <div class="col-4 themed-grid-col">Администратор</div>
    <div class="col-4 themed-grid-col">Дата и время</div>
  </div>

  <div class="row mb-4 text-center" style="background: gray;">
    <?php require "files/login/log.php"; ?>
  </div>

</div>

  <?php } ?>

</body>
</html>
