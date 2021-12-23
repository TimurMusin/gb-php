<!-- Урок 5. -->
<?php

// Задание 1.
// Создать галерею изображений, состоящую из двух страниц:
// просмотр всех фотографий (уменьшенных копий);
// просмотр конкретной фотографии (изображение оригинального размера) по ее ID в базе данных.
// Задание 2.
// В базе данных создать таблицу, в которой будет храниться информация о картинках (адрес на сервере, размер, имя).
// Задание 3.
// *На странице просмотра фотографии полного размера под картинкой должно быть указано число ее просмотров.
// Задание 4.
// *На странице просмотра галереи список фотографий должен быть отсортирован по популярности.
// Популярность = число кликов по фотографии.


$img_dir = './images/';
// $dbserver = 'localhost';
// $dbuser = 'root';
// $dbpassword = 'qwerty';
// $dbname = 'gb-php';
// $dbport = '3306';
// $dblink = "'$dbserver','$dbuser','$dbpassword','$dbname','$dbport'";

function linkToDB() {
    // global $dblink;
    // $link = mysqli_connect($dblink);
    $link = mysqli_connect('localhost','root','qwerty','gb-php','3306');
    if ($link) {
        return $link;
    } else {
        die('Connection error');
    }
}

function closeLinkToDB($link) {
    mysqli_close($link);
}

function createTable($link, $table) {
    if ($link) {
        mysqli_query($link, `create table if not exists '$table';`);
    } else {
        die('Connection to DB error');
    }
}


function checkImageInDB($file, $link) {
    $images = mysqli_query($link, 'select filename from images where 1');
    while ($row = mysqli_fetch_assoc($images)) {
        if ($row["filename"] == $file) {
            return true;
            break;
        }
    }
    return false;
}

function addImagesToDB($img_dir, $link) {
    $files = scandir($img_dir);
    foreach ($files as $file) {
        if (mime_content_type($img_dir.$file) === 'image/jpeg' && $file !== '.' && $file !== '..') {
            if (!checkImageInDB($file, $link)) {
                mysqli_query($link, "insert into images (filename) values('$file')");
            }
        }
    }
}


function renderGallery() {
    $link = linkToDB();
    global $img_dir;
    addImagesToDB($img_dir, $link);
    $images = mysqli_query($link, 'select id, filename from images where 1 order by viewcount desc');
    while ($row = mysqli_fetch_assoc($images)) {
        echo '<a id="'.$row["id"].'" href="image05.php?id='.$row["id"].'">
        <img style="width: 200px" src="' . $img_dir . $row["filename"] . '">
        </a>';
    }

    closeLinkToDB($link);
}

renderGallery();

