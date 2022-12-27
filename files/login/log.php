<?php
$bd = $pdo->prepare("SELECT * FROM `log` ORDER BY `id` DESC");
$bd->execute();
while ($item = $bd->fetch(PDO::FETCH_OBJ)) {

	$id_user = $item->id_user;

    $stt = $pdo->prepare("SELECT * FROM `admin` WHERE `id` = $id_user ORDER BY `id` DESC");
    $stt->execute();
    $user = $stt->fetch(PDO::FETCH_OBJ);

    $user = $user->login;

	$descr = $item->descr;
	$date_at = $item->date_at;
	$time_at = $item->time_at;

    if ($date_at == date("d.m.y", strtotime("+1 hours"))) {
        $date_at = "Сегодня";
    }

    if ($date_at == date("d.m.y", strtotime("-1 days", "+1 hours"))) {
        $date_at = "Вчера";
    }

    $date = $date_at." в ".$time_at;

	require 'log_temp.php';
}
?>
