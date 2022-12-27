<?php
require "connection.php";

$id = $_POST['id'];

$today = date("d.m.y", strtotime("+1 hours"));
$time = date('H:i', strtotime("+1 hours"));

if (isset($_FILES['file'])) {
    require "files/item/file.php";
}

if (isset($_POST['red'])) {
    require "files/item/red.php";
}

if (isset($_POST['unlock'])) {
    require "files/item/unlock.php";
}

if (isset($_POST['lock'])) {
    require "files/item/lock.php";
}

require "files/item/catalog.php";

if (isset($_POST['delete'])) {
    require "files/item/delete.php";
}

require "files/item/plus_view.php";

$views_count = $views_count.' просмотр'.$t;

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
<button type="button" class="btn btn-primary" style="position: fixed; margin-left: 20px;" onclick="window.location.href = '/';">На главную</button>
<h1>Frozen shop</h1>
<div class="container" style="width: 60%">
    <div class="form1">

        <script type="text/javascript">
            jQuery(function(){
                $("#image").change(function() {
                    $("#myform").submit();
                });
            });
        </script>

        <div class="d-flex gap-3 justify-content-center">
            <?php if ($_SESSION['admin_id']) { ?>
            <form enctype="multipart/form-data" action="/item.php" method="post" id="myform">
                <input type="hidden" value="<?=$id?>" name="id" id="id">
                <input type="hidden" value="<?=$image?>" name="pic" id="pic">
                <div class="image-upload">
                    <label for="image">
                    <img src="<?=$image?>" class="avatar2" alt="нет изображения" style="object-fit: cover; width: 300px; height: 300px; margin-right: 5px; margin-top: 5px">
                    </label>
                    <input class="avatar2" type="file" name="file" id="image" accept=".jpg,.jpeg,.png">
                </div>
            </form>
            <?php } else { ?>
                <img src="<?=$image?>" alt="редактировать" class="avatar2" style="object-fit: cover; width: 300px; height: 300px; margin-right: 5px; margin-top: 5px">
            <?php } ?>
        </div>

        <?php if ($_SESSION['admin_id']) { ?>
            <div style="color: <?=$published ? 'blue' : 'red';?>; text-align: center;"><b><?=$published ? 'Опубликован' : 'Не опубликован';?></b></div>
        <?php } ?>

        <form action="/item.php" method="post">
            <input type="hidden" value="<?=$id?>" name="id" id="id">

            <?php if ($_SESSION['admin_id']) { ?>

            <input type="text" value="<?=$title?>" name="title" id="title" placeholder="Название" class="form-control" style="margin-bottom: 10px" autocomplete="off" required maxlength="35">

            <div class="form-group">
                <textarea class="form-control" id="content" name="content" rows="5" placeholder="Описание" autocomplete="off" required><?=$content?></textarea>
            </div>

            <div class="d-flex gap-3 justify-content-center">
                <button type="submit" class="btn btn-success" id="red" name="red" style="margin-top: 20px;">Изменить</button>
            </div>

            <button type="submit" name="<?=$published ? 'lock' : 'unlock';?>" class="btn btn-primary"><?=$published ? 'Снять с публикации' : 'Опубликовать';?></button>
            
            <button type="submit" name="delete" class="btn btn-danger">Удалить</button>

            <?php } else { ?>

            <input type="text" readonly value="<?=$title?>" class="form-control" onkeypress="return event.keyCode != 13;" style="margin-bottom: 10px">

            <div class="form-group">
                <textarea readonly class="form-control" rows="5" onkeypress="return event.keyCode != 13;"><?=$content?></textarea>
            </div>

            <?php } ?>

        </form>

        <div style="color: black;"><?=$views_count?></div>

        <?php if ($_SESSION['admin_id']) { ?>

        <div style="color: black;">Дата создания: <?=$created_at?></div>
        <div style="color: black;">Дата редактирования: <?=$updated_at?></div>

        <?php } ?>

        </div>
    </div>
</div>
</body>
</html>
