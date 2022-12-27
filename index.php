<?php
require "connection.php";
require "files/index/view.php";
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
<style>
.create {
    display: none;
    margin-top: 10px;
}
</style>
<body style="background: #111111; color: white;">
<div class="container">
    <h1>Frozen shop</h1>

    <?php
        if ($_SESSION['admin_id']) { require "Files/index/create.php"; }
    ?>  

    <br>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" style="color: black">
        <?php
        require "files/index/product.php";
        ?>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div>
    <?php
        require "files/index/pagination.php";
    ?>
        </div>
    </div>
</div>
</body>
</html>
