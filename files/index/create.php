<?php
if (isset($_POST['create'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $published = $_POST['published'];

    if ($published) {
        $published = 1;
    } else {
        $published = 0;
    }

    if ($_FILES && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $image = "img/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $image);
    }

    $today = date("d.m.y", strtotime("+1 hours"));
    $time = date('H:i', strtotime("+1 hours"));

    $sql = 'INSERT INTO items(content, image, views_count, published, created_at, title, updated_at) VALUES(:content, :image, :views_count, :published, :created_at, :title, :updated_at)';
    $query = $pdo->prepare($sql);
    $query->execute(['content' => $content, 'image' => $image, 'views_count' => '0', 'published' => $published, 'created_at' => $today, 'title' => $title, 'updated_at' => $today]);

    $title = substr($title, 0, 10);

    $descr = "Добавлена новая запись $title";

    $sql = 'INSERT INTO log(id_user, descr, date_at, time_at) VALUES(:id_user, :descr, :date_at, :time_at)';
    $query = $pdo->prepare($sql);
    $query->execute(['id_user' => $_SESSION['admin_id'], 'descr' => $descr, 'date_at' => $today, 'time_at' => $time]);

    header('Location: /');
}
?>

<script type="text/javascript">
    function myFunction() {
        var checkBox = document.getElementById("flexSwitchCheckDefault");
        var create = document.getElementById("create");
        if (checkBox.checked == true) {
            create.style.display = "block";
        } else {
           create.style.display = "none";
        }
    }
</script>
   
    <div class="form-check form-switch" style="margin-bottom: 10px">
        <input class="form-check-input" style="width: 40px; height: 20px;" type="checkbox" id="flexSwitchCheckDefault" onclick="myFunction()">
        <label class="form-check-label" for="flexSwitchCheckDefault" style="margin-left: 10px;">Новый товар</label>
    </div>

<div class="create" id="create">
<form action="/" method="post" enctype="multipart/form-data">
    <input type="text" value="" name="title" id="title" placeholder="Название" class="form-control" style="margin-bottom: 10px" autocomplete="off" required maxlength="35">

<div class="mb-3">
  <input class="form-control" type="file" name="file" accept=".jpg,.jpeg,.png" required>
</div>

    <div class="d-flex gap-3 justify-content-center">
        <div class="form-check form-switch" style="margin-bottom: 10px">
            <input class="form-check-input" id="published" name="published" style="width: 40px; height: 20px;" type="checkbox" id="pub" checked>
            <label class="form-check-label" for="pub" style="margin-left: 10px;">Изначально опубликован</label>
        </div>
    </div>

    <div class="form-group">
    <textarea class="form-control" id="content" name="content" rows="5" placeholder="Описание" autocomplete="off" required></textarea>
    </div>

    <div class="d-flex gap-3 justify-content-center">
    <button type="submit" class="btn btn-success" id="create" name="create" style="margin-top: 20px;">Добавить</button>
    </div>
</form>
</div>

