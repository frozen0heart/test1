<?php
$bd = $pdo->prepare("SELECT * FROM `items` WHERE `id` = $id");
$bd->execute();
$item = $bd->fetch(PDO::FETCH_OBJ);

$title = $item->title;
$image = $item->image;
$views_count = $item->views_count;
$created_at = $item->created_at;
$published = $item->published;
$created_at = $item->created_at;
$updated_at = $item->updated_at;
$content = $item->content;

if ($views_count == null) {
    $views_count = 0;
}

if ($published == null) {
    $published = 0;
}

$number = substr($views_count, -2);

if($number > 10 and $number < 15)
{
    $t = "ов";
}
else
{ 
    $number = substr($number, -1);

    if($number == 0) {$t = "ов";}
    if($number > 1 ) {$t = "а";}
    if($number > 4 ) {$t = "ов";}
}
?>
