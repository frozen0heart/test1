<?php
$title = $_POST['title'];
$content = $_POST['content'];

$query = $pdo->prepare("UPDATE `items` SET `content` = :content, `title` = :title, `updated_at` = :updated_at WHERE `id` = $id");
$query->execute(array('content' => $content, 'title' => $title, 'updated_at' => $today));

$title = substr($title, 0, 10);

$descr = "Изменил содержание товара $id на $title";

$sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
$query = $pdo->prepare($sql);
$query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);
?>
