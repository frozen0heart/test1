<?php

$limit_pag = 5;
$limit_view = $limit_pag;

if ($Records > $limit) {
    $count_page = (int) ($Records / $limit);

    if ($Records > ($count_page * $limit)) {
        $count_page++;
    }

    if ($i > 2) {
        $i = $i - 3;
    } else {
        $i = 0;
    }

    if ($page == $limit_view - 1) $i--; // Минус один назад, если там одна

    if ($page + 1 == $limit_view) $limit_view++; // Плюс один вперед, если чтобы спереди было 2, а не 3

    if ($page == $count_page - 1) $i--; // Если мы почти в самом конце видимой части, то минус один назад

    if ($page + 1 >= $limit_view) $limit_view = $limit_view + 2; // Плюс два вперед, если мы в конце видимой части

    if ($page == $count_page) $i = $i - 2; // Минус два назад, если мы в конце списка

    if ($count_page - 1 == $limit_view) $limit_view = $count_page; // Если близко конец пагинации, то лучше пусть будет "5 6 7", чем "5 6 ... 7"

    if ($i == $limit_pag - 1) $i--; // Если недалеко от начала пагинации, то лучше пусть будет "1 2 3", чем "1 ... 2 3"

    if ($page >= $limit_pag) { ?>
        <button type="submit" onclick="window.location.href = '/?page=1';" class="btn btn-primary">1</button>
        <a>...</a>
        <?php
    }

    if ($i < 0) {
        $i = 0;
    }

    while($i != $count_page) {
        $i++;

        if ($i > $limit_view) {
            break;
        }

        if ($page == $i || ($page == null && $i == 1)) {
            ?>
            <button type="button" class="btn btn-success"><?=$i?></button>
            <?php
        } else {
            ?>
            <button type="submit" onclick="window.location.href = '/?page=<?=$i?>';" class="btn btn-primary"><?=$i?></button>
            <?php
        }
    }
    if ($count_page > $limit_view) {
        ?>
        <a>...</a>
        <button type="submit" onclick="window.location.href = '/?page=<?=$count_page?>';" class="btn btn-primary"><?=$count_page?></button>
        <?php
    }
}
?>
