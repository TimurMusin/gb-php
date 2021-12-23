<?php
$image_id = $_GET["id"];
$img_dir = './images/';

function linkToDB() {
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


function renderPage() {
    global $image_id;
    global $img_dir;
    $link = linkToDB();
    mysqli_query($link, 'update images set viewcount = viewcount + 1 where id = ' . $image_id);
    $query = mysqli_query($link, 'select filename, viewcount from images where id = ' . $image_id);
    $result = mysqli_fetch_assoc($query);
    $image_name = $result["filename"];
    $image_views = $result["viewcount"];
    echo '<img src="' . $img_dir . $image_name . '">';
    echo '<br>';
    echo 'Просмотров : ' . $image_views;
    closeLinkToDB($link);
}

renderPage();