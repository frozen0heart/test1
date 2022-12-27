<?php
$pdo->exec("DELETE FROM `items` WHERE `id` = $id");

unlink($image);

$descr = "Удалил товар $id";

$sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
$query = $pdo->prepare($sql);
$query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);

header('Location: /');
?>
