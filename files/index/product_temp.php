<div class="col" style="<?=$published ? '' : 'opacity: .5';?>">
  <div class="card shadow-sm">
    <img src="<?=$image?>" alt="редактировать" class="img-thumbnail" style="height: 300px; object-fit: cover;">
    <div class="card-body">
      <p class="card-text"><b><?=$title?></b></p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
        <form action="/item.php" method="post">
          <input type="hidden" value="<?=$id?>" name="id" id="id">
          <button type="submit" class="btn btn-success">Детали</button>
          <?=$published ? '' : "Не опубликовано";?>
        </form>
        </div>
        <small class="text-muted" style="text-align: right;"><?=$created_at?><br><?=$views_count?></small>
      </div>
    </div>
  </div>
</div>
