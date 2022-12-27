<?php
if (empty($_SESSION['plus_view'])) {

    if ($published == 1) {

    $_SESSION['plus_view'] = true;

    $query = $pdo->prepare("UPDATE `items` SET `views_count` = :views_count WHERE `id` = $id");
    $query->execute(array('views_count' => $views_count + 1));

    $views_count++;

    $number = substr($views_count, -2);

    if($number > 10 and $number < 15)
    {
        $t = "ов";
    }
    else { 
        $number = substr($number, -1);

        if($number == 0) {$t = "ов";}
        if($number > 1 ) {$t = "а";}
        if($number > 4 ) {$t = "ов";}
        }
    }
}
?>
