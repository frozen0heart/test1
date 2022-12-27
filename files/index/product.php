<?php

$limit = 9;

$page = $_GET['page'];

if ($page) {
	$start = ($page - 1) * $limit;
	$i = $page;
} else {
	$start = 0;
}

if ($_SESSION['admin_id']) {
	$part = "FROM `items` ORDER BY `id` DESC";
} else {
	$part = "FROM `items` WHERE `published` = 1 ORDER BY `id` DESC";
}

$count = $pdo->prepare("SELECT * " . $part);
$count->execute();
$Records = $count->rowCount();

$bd = $pdo->prepare("SELECT * " . $part . " LIMIT $start, $limit");
$bd->execute();
while ($item = $bd->fetch(PDO::FETCH_OBJ)) {

	$id = $item->id;
	$title = $item->title;
	$image = $item->image;
	$views_count = $item->views_count;
	$created_at = $item->created_at;
	$published = $item->published;

	if ($published == null) {
    	$published = 0;
	}

	$number = substr($views_count, -2);

    if($number > 10 and $number < 15) {
        $t = "ов";
    } else { 
        $number = substr($number, -1);
        if($number == 0) {$t = "ов";}
        if($number > 1 ) {$t = "а";}
        if($number > 4 ) {$t = "ов";}
    }
    $views_count = $views_count.' просмотр'.$t;
	require 'product_temp.php';
}

?>
