<?php











$today = date("d.m.y", strtotime("+1 hours"));
$time = date('H:i', strtotime("+1 hours"));

$pass = $_POST['pass'];

$bd = $pdo->prepare("SELECT * FROM `admin` WHERE `password` = :pass");
$bd->execute(array('pass' => $pass)); 
$user = $bd->fetch(PDO::FETCH_OBJ);

$id = $user->id;
$login = $user->login;

if ($id) {
	$_SESSION['admin_id'] = $id;
} else {
	$error = "1";
}

$descr = "Вошёл в режим администратора";

$sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
$query = $pdo->prepare($sql);
$query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);
?>
