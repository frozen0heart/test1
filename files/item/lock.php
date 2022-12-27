<?php
$query = $pdo->prepare("UPDATE `items` SET `published` = :published, `updated_at` = :updated_at WHERE `id` = $id");
$query->execute(array('published' => '0', 'updated_at' => $today));

$descr = "Снял с публикации товар $id";

$sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
$query = $pdo->prepare($sql);
$query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);
?>
