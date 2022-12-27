<?php
$old_image = $_POST['pic'];

if ($_FILES && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
    unlink($old_image);
    $image = "img/" . $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $image);
}
$query = $pdo->prepare("UPDATE `items` SET `image` = :image, `updated_at` = :updated_at WHERE `id` = $id");
$query->execute(array('image' => $image, 'updated_at' => $today));

$descr = "Изменил картинку товара";

$sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
$query = $pdo->prepare($sql);
$query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);
?>
