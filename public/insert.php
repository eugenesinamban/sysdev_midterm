<?php
require_once(__DIR__ . '/libs/message_repository.php');
require_once(__DIR__ . '/libs/image_repository.php');
$message_repository = new MessageRepository();
$image_repository = new ImageRepository();

$image_filename = null;
if (isset($_FILES['image']) && !empty($_FILES['image']['tmp_name'])) {
    if (preg_match('/^image\//', $_FILES['image']['type']) !== 1 && !exif_imagetype($_FILES['image']['tmp_name'])) {
        // アップロードされたものが画像ではなかった場合
        header("HTTP/1.1 302 Found");
        header("Location: ./index.php");
        exit;
    }
    $image_filename = $image_repository->upload_image($_FILES['image']['tmp_name'], $_FILES['image']['name']);
}

$title = trim($_POST['title']);
$message = trim($_POST['message']);
$message_repository->insert_message($title, $message, $image_filename);
header("HTTP/1.1 302 Found");
header('Location: ./index.php');
exit;